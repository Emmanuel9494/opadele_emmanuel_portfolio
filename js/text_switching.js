// Text Switching
export function textSwitching() {
    const selectors = [".top-text-switch", ".middle-text-switch", ".bottom-text-switch"];
    const sequences = [
        ["Ux / Ui designer", "Developer", "2D / 3D artist", "Gamer"],
        ["Developer", "2D / 3D artist", "Gamer", "Ux / Ui designer"],
        ["2D / 3D artist", "Gamer", "Ux / Ui designer", "Developer"]
    ];
    
    function textSwitch(selector, sequence, interval = 2500) {
        const element = document.querySelector(selector);
        if (element) {
            let index = 0;
            
            const updateText = () => {
                // Different animations for middle vs outer text
                if (selector === ".middle-text-switch") {
                    // Middle text: Scramble animation
                    const scrambleChars = ['-', '_'];
                    let scrambleCount = 0;
                    const maxScrambles = 8;
                    
                    const scrambleInterval = setInterval(() => {
                        if (scrambleCount >= maxScrambles) {
                            clearInterval(scrambleInterval);
                            element.textContent = sequence[index];
                            return;
                        }
                        
                        const scrambleText = Array(sequence[index].length)
                            .fill()
                            .map(() => scrambleChars[Math.floor(Math.random() * scrambleChars.length)])
                            .join('');
                        
                        element.textContent = scrambleText;
                        scrambleCount++;
                    }, 100);
                } else {
                    // Top and bottom text: Cut animation
                    element.style.transform = 'translateY(-100%)';
                    element.style.opacity = '0';
                    
                    setTimeout(() => {
                        element.textContent = sequence[index];
                        element.style.transform = 'translateY(0)';
                        element.style.opacity = '1';
                    }, 50);
                }
                
                // Update index
                index = (index + 1) % sequence.length;
            };
            
            // Initial update
            updateText();
            
            // Set up interval for subsequent updates
            setInterval(updateText, interval);
        }
    }
    
    // Loop selector and sequence
    selectors.forEach((selector, i) => {
        textSwitch(selector, sequences[i]);
    });
}