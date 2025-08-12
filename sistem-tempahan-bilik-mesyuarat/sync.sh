#!/bin/bash
# GitHub sync script — pulls latest changes, merges, then pushes

set -e  # Exit if any command fails

# Ensure we’re in the repo root
cd "$(dirname "$0")"

# Make sure remote is using SSH (no username/password prompts)
git remote set-url origin git@github.com:mrunknownpbu/sistem-tempahan-bilik-mesyuarat.git

# Step 1: Fetch and pull latest changes
echo "📥 Pulling latest changes from GitHub..."
git fetch origin
git pull origin master --rebase

# Step 2: Stage all local changes
echo "📦 Staging changes..."
git add .

# Step 3: Commit with timestamp if there are changes
if ! git diff --cached --quiet; then
    git commit -m "Sync update on $(date '+%Y-%m-%d %H:%M:%S')"
else
    echo "ℹ️ No changes to commit."
fi

# Step 4: Push to GitHub
echo "🚀 Pushing changes..."
git push origin master

echo "✅ Sync complete — local & remote are now in sync."
