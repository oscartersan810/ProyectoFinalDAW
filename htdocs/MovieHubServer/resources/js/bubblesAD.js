// Bubbles Animation Acerca De
    document.addEventListener("mousemove", (e) => {
        let bubble = document.createElement("div");
        let size = Math.random() * 60;
        bubble.className = "buble";
        bubble.style.width = 1 + size + "px";
        bubble.style.height = 1 + size + "px";
        bubble.style.left = e.pageX - size / 2 + "px";
        bubble.style.top = e.pageY - size / 2 + "px";
        document.body.appendChild(bubble);
        setTimeout(() => bubble.remove(), 5000);
    });
