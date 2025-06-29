FROM ubuntu:22.04

# Install dependencies
RUN apt-get update && apt-get install -y \
    qbittorrent-nox \
    python3 \python3-pip \
    zip \
    unzip \
    curl \
    wget \
    p7zip-full \
    cron \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install required Python packages
RUN pip3 install python-telegram-bot telethon pyrogram tgcrypto

# Create directories
RUN mkdir -p /downloads /config /scripts

# Copy scripts
COPY scripts/ /scripts/
RUN chmod +x /scripts/*.py /scripts/*.sh

# Set environment variables
ENV QBITTORRENT_USERNAME=admin
ENV QBITTORRENT_PASSWORD=adminadmin
ENV QBITTORRENT_PORT=8080
ENV API_ID=25217592
ENV API_HASH=82066a5588eb307441fac11da76a912a
ENV BOT_TOKEN=7621327050:AAEqMFL3OjZnAeQ6hvkBqmCp-oNDBsgtwmc

# Expose qBittorrent port
EXPOSE 8080

# Start services
CMD ["/scripts/start.sh"]
