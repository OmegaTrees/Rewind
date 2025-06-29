#!/bin/bash

# This script is triggered by qBittorrent when a download completes
# $1 is the full path to the downloaded file/folder

DOWNLOAD_PATH="$1"
FILENAME=$(basename "$DOWNLOAD_PATH")
WORK_DIR=$(dirname "$DOWNLOAD_PATH")
SPLIT_SIZE="1950m"  # 1.95GB

cd "$WORK_DIR"

# Check if it's a directory or file
if [ -d "$DOWNLOAD_PATH" ]; then
    # Create split zip files
    zip -r -s $SPLIT_SIZE "${FILENAME}.zip" "$FILENAME"
else
    # Create split zip files for a single file
    zip -s $SPLIT_SIZE "${FILENAME}.zip" "$FILENAME"
fi

# Trigger the upload script
python3 /scripts/upload_to_telegram.py "$WORK_DIR/${FILENAME}.zip"

# Clean up original files after successful upload
if [ $? -eq 0 ]; then
    rm -rf "$DOWNLOAD_PATH"
fi
