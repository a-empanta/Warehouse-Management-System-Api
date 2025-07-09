# 🐳 Laravel & React App Generator — with Pure Docker

This project lets you **create Laravel and React apps** on a Linux system **without installing PHP or Node.js** locally.

You only need:
- ✅ Docker
- ✅ Docker Compose
- ✅ Make

That’s it. No PHP, no Node, no clutter.

---

## 🚀 What It Does

This project uses temporary Docker containers to scaffold new apps. It:

- Spins up a container (`PHP` or `Node`)
- Creates a new **Laravel** or **React (Vite)** project inside your filesystem
- Cleans up everything: stops and deletes containers, images, and volumes

All automatically. No leftover Docker junk.

---

## 📦 Requirements

Make sure you have the following installed:

- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)
- `make` utility (usually pre-installed on Linux)

---

## 🛠 Usage

### Create a Laravel app

```bash
make laravel name=your-laravel-project
```

### Create a React app

```bash
make react name=your-react-project
```
