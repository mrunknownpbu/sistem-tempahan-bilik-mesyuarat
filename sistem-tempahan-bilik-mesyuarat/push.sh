#!/bin/bash
# Push local files to GitHub with flattened structure

set -e

# Step 1: Create orphan branch to avoid nesting issues
git checkout --orphan temp_branch

# Step 2: Add all files
git add .

# Step 3: Commit with timestamp
git commit -m "Update on $(date '+%Y-%m-%d %H:%M:%S')"

# Step 4: Replace master branch
git branch -D master
git branch -m master

# Step 5: Push to GitHub (force to overwrite)
git push origin master --force

# Step 6: Switch back to master (already done by rename)
echo "✅ Push complete — Repo updated without nesting."
