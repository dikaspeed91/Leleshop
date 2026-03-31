# 🚀 Modern Portfolio Website with Firebase Chat

## ✨ Features
- **Neon Eva Theme** - Modern glassmorphism UI
- **Dynamic Projects** - Loads from `projects.json`
- **Real-time Chat** - Firebase Firestore + Google/GitHub Auth
- **Skills Visualizer** - Interactive hover animations
- **Fully Responsive** - Mobile-first design
- **Live Server Ready** - VSCode integration

## 📋 Quick Start

### 1. Install Dependencies
```bash
cd portfolio-website
npm install
```

### 2. Start Development Server
```bash
npm run dev
```
- Opens automatically: http://localhost:5500
- Projects load from `projects.json`
- Hot reload enabled

### 3. Configure Firebase (Chat/Auth)
1. Go to [Firebase Console](https://console.firebase.google.com/)
2. Create new project
3. Enable **Authentication** → Sign-in method → Enable **Google** + **GitHub**
4. Enable **Firestore Database** → Start in **test mode**
5. Project Settings → Your apps → **Web** (`</>` icon) → Copy config
6. Open `js/firebase-config.js` → Replace `firebaseConfig` object
7. Reload page → Console shows ✅ Connected

**Live Demo Paths:**
- Portfolio: http://localhost:5500/index.html
- Chat: http://localhost:5500/chat.html  
- Skills: http://localhost:5500/skills-visualizer/

## 🛠️ Scripts
```bash
npm run dev      # Live Server (localhost:5500)
npm run preview  # Network access (0.0.0.0:5500)
npm run lint     # ESLint check
npm run lint:fix # Auto-fix issues
```

## 📁 Structure
```
portfolio-website/
├── index.html           # Main portfolio
├── chat.html           # Firebase chat room
├── skills-visualizer/  # Interactive skills demo
├── projects.json       # Add your projects here
├── js/
│   ├── app.js         # Projects loader + auth
│   └── firebase-config.js  # 🔥 Your Firebase config
├── css/               # Modern neon themes
├── images/            # Assets
├── package.json       # npm scripts
└── .vscode/           # VSCode Live Server config
```

## 🔧 Adding Projects
Edit `projects.json`:
```json
{
  "name": "Your Project",
  "description": "...",
  "technologies": ["HTML", "CSS"],
  "image": "images/your-image.png",
  "github": "https://...",
  "live": "https://..."
}
```
Hot reloads automatically!

## ⚠️ Troubleshooting
| Issue | Solution |
|-------|----------|
| `file://` errors | Run `npm run dev` (needs http server) |
| Firebase auth fails | Update `js/firebase-config.js` with real config |
| Projects not loading | Check `projects.json` syntax + image paths |
| VSCode no Live Server | Install extension via `.vscode/extensions.json` |
| Images missing | Add to `images/` folder |

## 🌐 Deployment
```bash
npm run build  # (future)
# Deploy dist/ to Netlify/Vercel/Firebase Hosting
```

## 📱 VSCode Extensions (Auto-prompted)
- Live Server (ritwickdey.liveserver)
- ESLint + Prettier
- Auto Rename Tag

---

**Made with ❤️ by M. Andika Nur Allanuril**  
[GitHub](https://github.com/dikaspeed91) | dikaspeed91@gmail.com
