#!/usr/bin/env python3
import os
import time
import requests
from urllib.parse import urljoin

# qBittorrent credentials
username = os.environ.get('QBITTORRENT_USERNAME', 'admin')
password = os.environ.get('QBITTORRENT_PASSWORD','adminadmin')
port = os.environ.get('QBITTORRENT_PORT', '8080')
base_url = f'http://localhost:{port}'

# Wait for qBittorrent to be ready
for _ in range(30):
    try:
        response = requests.get(urljoin(base_url, '/api/v2/app/version'))
        if response.status_code == 200:break
    except:
        pass
    time.sleep(1)
else:
    print("qBittorrent WebUI is not responding")
    exit(1)

# Login
session = requests.Session()
login_data = {'username': username,'password': password}
response = session.post(urljoin(base_url, '/api/v2/auth/login'), data=login_data)

if response.text == 'Fails.':
    # First time setup uses default credentials
    login_data = {'username': 'admin', 'password':'adminadmin'}
    session.post(urljoin(base_url, '/api/v2/auth/login'), data=login_data)
    
    # Change password
    preferences = {
        'web_ui_username': username,'web_ui_password': password,
        'save_path': '/downloads/',
        'autorun_enabled': True,
        'autorun_program': '/scripts/process_completed.sh "%F"'
    }session.post(urljoin(base_url, '/api/v2/app/setPreferences'), data={'json': str(preferences)})

print("qBittorrent setup completed")
