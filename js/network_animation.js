class NetworkAnimation {
    constructor() {
        this.canvas = document.createElement('canvas');
        this.ctx = this.canvas.getContext('2d');
        this.bubbles = [];
        this.connections = [];
        this.numberOfBubbles = 15;
        this.maxConnections = 1;
        this.minDistance = 150;
        this.maxDistance = 500;
        this.bubbleImage = new Image();
        this.bubbleImage.src = 'images/mb-works-hero.svg';
        
        this.init();
    }

    init() {
        // Set canvas size
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;
        
        // Style canvas
        this.canvas.style.position = 'absolute';
        this.canvas.style.top = '0';
        this.canvas.style.left = '0';
        this.canvas.style.zIndex = '1';
        this.canvas.style.opacity = '0.7';
        
        // Add canvas to hero section
        const heroSection = document.querySelector('#hero-main');
        heroSection.insertBefore(this.canvas, heroSection.firstChild);
        
        // Wait for image to load before creating bubbles
        this.bubbleImage.onload = () => {
            // Create bubbles
            this.createBubbles();
            
            // Start animation
            this.animate();
        };
        
        // Handle window resize
        window.addEventListener('resize', () => {
            this.canvas.width = window.innerWidth;
            this.canvas.height = window.innerHeight;
        });
    }

    createBubbles() {
        for (let i = 0; i < this.numberOfBubbles; i++) {
            this.bubbles.push({
                x: Math.random() * this.canvas.width,
                y: Math.random() * this.canvas.height,
                size: Math.random() * 30 + 20, // Adjusted size for SVG
                speedX: (Math.random() - 0.5) * 2,
                speedY: (Math.random() - 0.5) * 2,
                rotation: Math.random() * Math.PI * 2,
                rotationSpeed: (Math.random() - 0.5) * 0.02
            });
        }
    }

    updateBubbles() {
        this.bubbles.forEach(bubble => {
            // Move bubble
            bubble.x += bubble.speedX;
            bubble.y += bubble.speedY;
            bubble.rotation += bubble.rotationSpeed;

            // Bounce off edges
            if (bubble.x < 0 || bubble.x > this.canvas.width) bubble.speedX *= -1;
            if (bubble.y < 0 || bubble.y > this.canvas.height) bubble.speedY *= -1;
        });
    }

    drawConnections() {
        this.connections = [];
        
        for (let i = 0; i < this.bubbles.length; i++) {
            for (let j = i + 1; j < this.bubbles.length; j++) {
                const dx = this.bubbles[i].x - this.bubbles[j].x;
                const dy = this.bubbles[i].y - this.bubbles[j].y;
                const distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < this.maxDistance && distance > this.minDistance) {
                    const opacity = 1 - (distance - this.minDistance) / (this.maxDistance - this.minDistance);
                    this.ctx.beginPath();
                    this.ctx.strokeStyle = `rgba(255, 0, 0, ${opacity * 0.2})`;
                    this.ctx.lineWidth = 3.5;
                    this.ctx.moveTo(this.bubbles[i].x, this.bubbles[i].y);
                    this.ctx.lineTo(this.bubbles[j].x, this.bubbles[j].y);
                    this.ctx.stroke();
                    
                    this.connections.push({
                        from: i,
                        to: j,
                        distance: distance,
                        opacity: opacity
                    });
                }
            }
        }
    }

    drawBubbles() {
        this.bubbles.forEach(bubble => {
            this.ctx.save();
            this.ctx.translate(bubble.x, bubble.y);
            this.ctx.rotate(bubble.rotation);
            this.ctx.drawImage(
                this.bubbleImage,
                -bubble.size / 2,
                -bubble.size / 2,
                bubble.size,
                bubble.size
            );
            this.ctx.restore();
        });
    }

    animate() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        
        this.updateBubbles();
        this.drawConnections();
        this.drawBubbles();
        
        requestAnimationFrame(() => this.animate());
    }
}

// Initialize animation when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new NetworkAnimation();
});