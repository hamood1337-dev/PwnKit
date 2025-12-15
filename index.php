<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>SYSTEM COMPROMISED</title>
    <style>
        @keyframes slide-across {
            0% {
                left: -200px; 
                right: auto;
            }
            100% {
                left: 100%; 
                right: auto;
            }
        }
        
        @keyframes delayed-visibility {
            0% { visibility: hidden; }
            100% { visibility: visible; }
        }

        body, html {
            background-image: url('https://c.tenor.com/oHZUQJEGd8UAAAAC/tenor.gif');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: #000;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            font-family: 'Courier New', Courier, monospace;
            display: block; 
        }

        #star-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1; 
            pointer-events: none;
        }

        .container, .header-main, .handles, .terminal-prompt { display: none; } 

        .corner-image {
            position: fixed;
            width: 180px; 
            height: 180px; 
            z-index: 5;
            opacity: 0.5; 
            transition: opacity 0.3s ease; 
            left: -200px; 
            visibility: hidden; 
            animation: 
                slide-across 12s linear infinite,
                delayed-visibility 0s 0s forwards; 
        }
        
        .corner-image:hover {
            opacity: 1; 
        }

        #img-1 { top: 5%; animation-delay: 0s, 0s; }
        #img-2 { top: 25%; animation-delay: 3s, 3s; }
        #img-3 { top: 45%; animation-delay: 6s, 6s; }
        #img-4 { top: 65%; animation-delay: 9s, 9s; }
        #img-5 { bottom: 5%; top: auto; transform: scaleX(-1); animation-delay: 1.5s, 1.5s; }
        #img-6 { bottom: 25%; top: auto; transform: scaleX(-1); animation-delay: 4.5s, 4.5s; }
        #img-7 { bottom: 45%; top: auto; transform: scaleX(-1); animation-delay: 7.5s, 7.5s; }
        #img-8 { bottom: 65%; top: auto; transform: scaleX(-1); animation-delay: 10.5s, 10.5s; }


        .terminal-overlay {
            position: fixed;
            top: 45%; 
            left: 50%; 
            transform: translate(-50%, -50%);
            width: 90%; 
            max-width: 800px; 
            height: 90vh; 
            max-height: 650px; 
            background-color: #000000; 
            border-radius: 4px; 
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.9);
            z-index: 20; 
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 1.1rem; 
            font-family: 'Monospace', 'Courier New', Courier, monospace;
            opacity: 0;
            animation: fade-in 1s ease forwards;
            animation-delay: 1.5s; 
            color: #ccc; 
        }

        .terminal-title-bar {
            background-color: #444; 
            padding: 5px 10px;
            text-align: center; 
            font-size: 0.9em;
            color: #fff;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1);
            user-select: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .terminal-controls {
            display: flex;
            gap: 6px;
        }

        .control-btn {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            cursor: default;
        }

        .close-btn { background-color: #ff5f56; } 
        .minimize-btn { background-color: #ffbd2e; } 
        .maximize-btn { background-color: #27c93f; } 
        
        .terminal-content {
            padding: 15px;
            text-align: left;
            overflow-y: auto; 
            flex-grow: 1;
            background-color: #000000; 
        }
        
        .motd-ascii {
            color: #FF6666; 
            white-space: pre; 
            font-size: 0.8rem; 
            line-height: 0.8; 
            margin-bottom: 20px;
            display: block;
            overflow-x: auto; 
            width: 100%; 
        }
        
        .animated-terminal-line {
            display: flex; 
            flex-direction: column; 
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .terminal-prompt-static {
            color: #FF6666; 
            white-space: pre; 
            line-height: 1.2; 
            display: flex;
            flex-direction: column;
        }

        .prompt-prefix {
            margin-bottom: -5px; 
        }
        
        .prompt-line-2 {
            display: flex; 
            align-items: center;
        }

        .prompt-user {
            color: #FF6666; 
            font-weight: bold;
        }
        .prompt-path {
            color: #FF6666; 
        }
        .terminal-prompt-hash {
            color: #FF6666; 
            margin-right: 5px;
        }

        .animated-message-container {
            display: inline-block; 
            font-size: 1.1rem;
            white-space: nowrap;
            overflow: hidden;
            width: 0;
            border-right: 3px solid #00FF00;
            animation: 
                type-full-message 3s steps(59, end) forwards, 
                blink-cursor-message-green .75s step-end infinite;
            animation-delay: 2.5s; 
            padding-bottom: 2px; 
            line-height: 1.2;
        }

        .hacked-by {
            color: #FF6666;
        }

        .hacker-names {
            color: #00FF00;
            text-shadow: 
                0 0 5px #00FF00,
                0 0 10px #00FF00,
                0 0 20px rgba(0, 255, 0, 0.5), 
                0 0 40px rgba(0, 255, 0, 0.2); 
        }
        
        @keyframes fade-in { from { opacity: 0; transform: translate(-50%, -50%) scale(0.9); } to { opacity: 1; transform: translate(-50%, -50%) scale(1); } }
        @keyframes type-full-message { from { width: 0; } to { width: 100%; } }
        @keyframes blink-cursor-message-green { from, to { border-color: transparent; } 50% { border-color: #00FF00; } } 

        .subtle-footer {
            position: fixed;
            bottom: 5px; 
            left: 50%;
            transform: translateX(-50%);
            z-index: 50; 
            text-align: center;
            font-size: 1.2rem; 
            color: #FF0000; 
            font-family: 'Courier New', Courier, monospace; 
            font-weight: bold;
            line-height: 1.5; 
            text-shadow: 
                0 0 5px #FF0000,
                0 0 10px #FF0000,
                0 0 20px #FF6666, 
                0 0 40px rgba(255, 0, 0, 0.5); 
        }

        .footer-email {
            display: block; 
            margin-bottom: 5px; 
            color: inherit; 
            text-decoration: none; 
            font-size: 1.5rem; 
        }

        @media (max-width: 600px) {
            
            .animated-message-container {
                font-size: 0.9rem; we
            }
            
            .motd-ascii {
                font-size: 0.6rem; 
                overflow-x: auto; 
            }

            .subtle-footer {
                font-size: 0.9rem; 
            }
            
            .footer-email {
                font-size: 1.2rem;
            }

            .corner-image {
                width: 100px;
                height: 100px;
            }
        }
    </style>
</head>
<body>

    <audio id="background-audio" autoplay loop hidden>
        <source src="http://134.0.194.186:8082/uploads/d.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <canvas id="star-canvas"></canvas>
    
    <img src="https://i.postimg.cc/pXkX6b2t/Untitled-removebg-preview.png" class="corner-image" id="img-1" alt="Penguin Decoration">
    <img src="https://i.postimg.cc/pXkX6b2t/Untitled-removebg-preview.png" class="corner-image" id="img-2" alt="Penguin Decoration">
    <img src="https://i.postimg.cc/pXkX6b2t/Untitled-removebg-preview.png" class="corner-image" id="img-3" alt="Penguin Decoration">
    <img src="https://i.postimg.cc/pXkX6b2t/Untitled-removebg-preview.png" class="corner-image" id="img-4" alt="Penguin Decoration">

    <img src="https://i.postimg.cc/pXkX6b2t/Untitled-removebg-preview.png" class="corner-image" id="img-5" alt="Penguin Decoration">
    <img src="https://i.postimg.cc/pXkX6b2t/Untitled-removebg-preview.png" class="corner-image" id="img-6" alt="Penguin Decoration">
    <img src="https://i.postimg.cc/pXkX6b2t/Untitled-removebg-preview.png" class="corner-image" id="img-7" alt="Penguin Decoration">
    <img src="https://i.postimg.cc/pXkX6b2t/Untitled-removebg-preview.png" class="corner-image" id="img-8" alt="Penguin Decoration">

    <div class="terminal-overlay">
        
        <div class="terminal-title-bar">
            <div class="terminal-controls">
                <div class="control-btn close-btn"></div>
                <div class="control-btn minimize-btn"></div>
                <div class="control-btn maximize-btn"></div>
            </div>
            
            <span>w00t@sore: ~</span>

            <div class="terminal-controls" style="visibility: hidden;">
                <div class="control-btn"></div>
                <div class="control-btn"></div>
                <div class="control-btn"></div>
            </div>
        </div>
        
        <div class="terminal-content">
            
            <pre class="motd-ascii">                             .:xxxxxxxx:.
                             .xxxxxxxxxxxxxxxx.
                            :xxxxxxxxxxxxxxxxxxx:.
                           .xxxxxxxxxxxxxxxxxxxxxxx:
                          :xxxxxxxxxxxxxxxxxxxxxxxxx:
                          xxxxxxxxxxxxxxxxxxxxxxxxxxX:
                          xxx:::xxxxxxxx::::xxxxxxxxx:
                         .xx:   ::xxxxx:     :xxxxxxxx
                         :xx  x.  xxxx:  xx.  xxxxxxxx
                         :xx xxx  xxxx: xxxx  :xxxxxxx
                         'xx 'xx  xxxx:. xx'  xxxxxxxx
                          xx ::::::xx:::::.   xxxxxxxx
                          xx:::::.::::.:::::::xxxxxxxx
                          :x'::::'::::':::::':xxxxxxxxx.
                          :xx.::::::::::::'   xxxxxxxxxx
                          :xx: '::::::::'     :xxxxxxxxxx.
                         .xx     '::::'        'xxxxxxxxxx.
                       .xxxx                     'xxxxxxxxx.
                     .xxxx                         'xxxxxxxxx.
                   .xxxxx:                          xxxxxxxxxx.
                  .xxxxx:'                          xxxxxxxxxxx.
                 .xxxxxx:::.           .       ..:::_xxxxxxxxxxx:.
                .xxxxxxx''      ':::''            ''::xxxxxxxxxxxx.
                xxxxxx            :                  '::xxxxxxxxxxxx
               :xxxx:'            :                    'xxxxxxxxxxxx:
              .xxxxx              :                     ::xxxxxxxxxxxx
              xxxx:'                                    ::xxxxxxxxxxxx
              xxxx               .                      ::xxxxxxxxxxxx.
          .:xxxxxx               :                      ::xxxxxxxxxxxx::
          xxxxxxxx               :                      ::xxxxxxxxxxxxx:
          xxxxxxxx               :                      ::xxxxxxxxxxxxx:
          ':xxxxxx               '                      ::xxxxxxxxxxxx:'
            .:. xx:.                                   .:xxxxxxxxxxxxx'
          ::::::.'xx:.            :                  .:: xxxxxxxxxxx':
  .:::::::::::::::.'xxxx.                            ::::'xxxxxxxx':::.
  ::::::::::::::::::.'xxxxx                          :::::.'.xx.'::::::.
  ::::::::::::::::::::.'xxxx:.                       :::::::.'':::::::::
  ':::::::::::::::::::::.'xx:'                     .'::::::::::::::::::::..
    :::::::::::::::::::::.'xx                    .:: :::::::::::::::::::::::
  .:::::::::::::::::::::::. xx               .::xxxx :::::::::::::::::::::::
  :::::::::::::::::::::::::.'xxx..        .::xxxxxxx ::::::::::::::::::::'
  '::::::::::::::::::::::::: xxxxxxxxxxxxxxxxxxxxxxx :::::::::::::::::'
    '::::::::::::::::::::::: xxxxxxxxxxxxxxxxxxxxxxx :::::::::::::::'
        ':::::::::::::::::::_xxxxxx::'''::xxxxxxxxxx '::::::::::::'
             '':.::::::::::'                        `._'::::::''</pre>

            <div class="animated-terminal-line">
                <span class="terminal-prompt-static">
                    <span class="prompt-prefix">┌──(<span class="prompt-user">w00t@sore</span>)-[<span class="prompt-path">~</span>]</span>
                    <span class="prompt-line-2">
                        <span class="terminal-prompt-hash">└─$</span>
                        <span class="animated-message-container">
                            <span class="hacked-by">HACKED BY </span><span class="hacker-names">SORE (@w00t1337x) / HARIB (@f_societyroot)</span>
                        </span>
                    </span>
                </span>
            </div>
            
        </div>
    </div>

    <div class="subtle-footer">
        <a href="mailto:spyware@email.com" class="footer-email">spyware@email.com</a>
        © 2025 All Rights Reserved.
    </div>

    <script>
        const canvas = document.getElementById('star-canvas');
        const ctx = canvas.getContext('2d');
        let stars = [];
        const count = 250; 

        function init() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            stars = [];
            for (let i = 0; i < count; i++) {
                const c = Math.random() > 0.5 ? 1 : 0; 
                stars.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height,
                    size: Math.random() * 1.5 + 0.5,
                    speed: Math.random() * 2 + 0.5,
                    opacity: Math.random(),
                    color: c 
                });
            }
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            
            stars.forEach(s => {
                const starColor = s.color === 0 ? '255, 0, 0' : '255, 255, 255'; 
                ctx.fillStyle = `rgba(${starColor}, ${s.opacity})`;
                
                ctx.beginPath();
                ctx.arc(s.x, s.y, s.size, 0, Math.PI * 2);
                ctx.fill();
                
                s.x += s.speed; 
                
                if (s.x > canvas.width) {
                    s.x = -5;
                    s.y = Math.random() * canvas.height;
                }
            });
            requestAnimationFrame(animate);
        }

        window.addEventListener('resize', init);
        init();
        animate();
        
        const audio = document.getElementById('background-audio');
        
        function cleanupListeners() {
            document.removeEventListener('click', resumeAudio);
            document.removeEventListener('keypress', resumeAudio);
            document.removeEventListener('touchend', resumeAudio); 
            console.log("Audio listeners removed.");
        }

        function resumeAudio() {
            if (audio.paused) {
                audio.play().then(() => {
                    cleanupListeners();
                    console.log("Audio resumed by user interaction (Mobile/Desktop).");
                }).catch(error => {
                    console.log("Error resuming audio:", error);
                });
            }
        }
        
        function attemptAutoplay() {
            if (audio) {
                audio.play().then(() => {
                    cleanupListeners();
                    console.log("Audio played successfully on load.");
                }).catch(error => {
                    console.log("Autoplay blocked. Waiting for user interaction.", error);
                    
                    document.addEventListener('click', resumeAudio);
                    document.addEventListener('keypress', resumeAudio);
                    document.addEventListener('touchend', resumeAudio); 
                });
            }
        }
        
        window.onload = attemptAutoplay; 
        
    </script>
</body>
</html
