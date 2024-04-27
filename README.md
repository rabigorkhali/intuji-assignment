
# Intuji Assignment

## Introduction

This is an assignment provided by Injuti Tech for a powerful PHP project designed to seamlessly connect with Google Calendar! Our goal is to provide users with a convenient tool that allows them to manage their events effortlessly. With this plugin, anyone can connect their Google Calendar account and perform essential actions like listing, creating, and deleting events directly from their calendar. The core features of our project include:

- **List Events:** View all upcoming events from your Google Calendar at a glance.
- **Create Events:** Easily add new events to your calendar without leaving the plugin.
- **Delete Events:** Remove unwanted events with a simple click, keeping your calendar organized.

## Installation

### Project Requirements

- PHP: 8.2
- Composer: 2.3.7

### How to Install

1. Clone the repository:
   ```
   git clone https://github.com/rabigorkhali/intuji-assignment .
   ```
2. Switch to the main branch:
   ```
   git checkout main
   ```
3. Install dependencies using Composer:
   ```
   composer install
   ```
4. Serve the project:
   ```
   php -S localhost:8006
   ```
   Note: Use port 8006 only, as serving on another port won't work due to the callback URL required for authentication in https://console.cloud.google.com.
   
5. Access the project:
   ```
   http://localhost:8006
   ```

Please keep the port and URL the same as `http://localhost:8006` since we have to allow callback URLs in Google Console, and currently, only the above URL is permitted. To change the URL, we will have to go to Google Console and submit the desired URL.

For testing, use the following email instead of a private email:

- **Username:** intujirabigorkhali@gmail.com
- **Password:** intujiisawesome

**Video Demo:** [Watch Demo](https://drive.google.com/file/d/1nZhIMcOWnO3n2k7UWxOHrK8aqXq2ZePw/view?usp=share_link)

**Note:** Since it's only for testing, the page might crash sometimes. In that case, log out of Gmail, close the browser, and serve it again. If there is still an issue, try again after a few minutes.

**Handbook:** Here is the [link](https://docs.google.com/document/d/1x59uLY6Llf3ywhfGYm8sQ7FbFOGjDNpEBeIKmasKFyg/edit) to the handbook on how to operate the system.

**Video Demo:** [Watch Demo](https://drive.google.com/file/d/1nZhIMcOWnO3n2k7UWxOHrK8aqXq2ZePw/view?usp=share_link)

---

Does this meet your needs?