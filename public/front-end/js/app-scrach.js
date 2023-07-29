var num = Math.floor(Math.random() * 4) + 1;
var num1 = Math.floor(Math.random() * 4) + 1;
var num2 = Math.floor(Math.random() * 4) + 1;
var num3 = Math.floor(Math.random() * 4) + 1;
var num4 = Math.floor(Math.random() * 4) + 1;



$("#card").wScratchPad({
  
  size: 100, // The size of the brush/scratch.
  bg: `Images/Gpay_Card ${num}.jpg`, // Background (image path or hex color).
  fg: `Images/front.jpg`, // Foreground (image path or hex color).
  cursor: "pointer", // Set cursor.
});


$("#card1").wScratchPad({
  size: 100, // The size of the brush/scratch.
  bg: `Images/Gpay_Card ${num1}.jpg`, // Background (image path or hex color).
  fg: `Images/front.jpg`, // Foreground (image path or hex color).
  cursor: "pointer", // Set cursor.
});

$("#card2").wScratchPad({
  size: 100, // The size of the brush/scratch.
  bg: `Images/Gpay_Card ${num3}.jpg`, // Background (image path or hex color).
  fg: `Images/front.jpg`, // Foreground (image path or hex color).
  cursor: "pointer", // Set cursor.
});

$("#card3").wScratchPad({
  size: 100, // The size of the brush/scratch.
  bg: `Images/Gpay_Card ${num4}.jpg`, // Background (image path or hex color).
  fg: `Images/front.jpg`, // Foreground (image path or hex color).
  cursor: "pointer", // Set cursor.
});

$("#card4").wScratchPad({
  size: 100, // The size of the brush/scratch.
  bg: `Images/Gpay_Card ${num5}.jpg`, // Background (image path or hex color).
  fg: `Images/front.jpg`, // Foreground (image path or hex color).
  cursor: "pointer", // Set cursor.
});


