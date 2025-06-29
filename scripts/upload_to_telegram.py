#!/usr/bin/env python3
import os
import sys
import glob
import asyncio
from pyrogram import Client

# Telegram API credentials
api_id = int(os.environ.get('API_ID'))
api_hash = os.environ.get('API_HASH')
bot_token = os.environ.get('BOT_TOKEN')

async def upload_file(app, file_path):
    try:
        print(f"Uploading {file_path} to Telegram...")
        await app.send_document(chat_id='me', document=file_path, progress=progress)
        print(f"Successfully uploaded {file_path}")return True
    except Exception as e:
        print(f"Error uploading {file_path}: {e}")
        return False

def progress(current, total):
    print(f"Uploaded {current * 100 / total:.1f}%")

async def main():
    if len(sys.argv) < 2:
        print("Usage: python upload_to_telegram.py<zip_file_path>")
        return
    
    zip_path = sys.argv[1]
    base_path = zip_path.replace('.zip', '')
    # Find all split zip parts
    if os.path.exists(zip_path):files_to_upload = [zip_path]else:
        # Look for split zip parts
        files_to_upload = sorted(glob.glob(f"{base_path}.z*"))if not files_to_upload:print("No zip files found to upload")
            return
    
    # Initialize Telegram clientapp = Client("bot", api_id=api_id, api_hash=api_hash, bot_token=bot_token)
    
    async with app:for file_path in files_to_upload:
            success = await upload_file(app, file_path)
            if success:
                os.remove(file_path)
            else:
                print(f"Failed to upload {file_path}, keeping file")

if __name__ == "__main__":
    asyncio.run(main())
