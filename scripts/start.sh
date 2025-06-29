#!/bin/bash

# Start qBittorrent
qbittorrent-nox --webui-port=$QBITTORRENT_PORT --profile=/config &
qb_pid=$!

# Wait for qBittorrent to start
sleep 5

# Set up qBittorrent initial configuration
python3 /scripts/setup_qbittorrent.py

# Start the monitor script
python3 /scripts/monitor_and_upload.py &

# Keep container running
wait $qb_pid
