// Text Switching
export  function textSwitching() {

    const selectors = [".top-text-switch", ".middle-text-switch", ".bottom-text-switch"];
    const sequences = [
      ["Ux / Ui designer", "Developer", "2D / 3D artist", "Gamer"],
      ["Developer", "2D / 3D artist", "Gamer", "Ux / Ui designer"],
      ["2D / 3D artist", "Gamer", "Ux / Ui designer", "Developer"]
    ];
    
    //text switching
    function textSwitch(selector, sequence, interval = 2500) {
      const element = document.querySelector(selector);
      if (element) {
        let index = 0;
    
        const updateText = () => {
          element.textContent = sequence[index];
          index = (index + 1) % sequence.length;
        };
    
        setInterval(updateText, interval);
      }
    }
    
    // loop selector and sequence
    selectors.forEach((selector, i) => {
        textSwitch(selector, sequences[i]);
    });
    
    }