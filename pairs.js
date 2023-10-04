// function to create a random image element
function createRandomImage(images) {
  const index = Math.floor(Math.random() * images.length);
  const image = document.createElement("img");
  image.classList.add("pairs-card");
  image.src = images[index];
  return image;
}

// function to shuffle an array randomly
function shuffleArray(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
}
  
// keeps track of the number of times each card has been created
const cardCounts = {};

//create a card HTML code with random skin, mouth, and eye images
/*
Formatting of the card class divs created :
<div class="card">
  <div class="cardInner">
    <div class="cardFront">          
      </div>
        <div class="cardBack">
          <img class="pairs-card" src="emoji assets/skin/yellow.png">
          <img class="pairs-card" src="emoji assets/mouth/straight.png">
          <img class="pairs-card" src="emoji assets/eyes/normal.png"> 
        </div>
      </div>
    </div>
*/
function createCardHTML() {
  // arrays of skin, mouth, and eye URLs
  const skinImages = [
    "emoji assets/skin/green.png",
    "emoji assets/skin/red.png",
    "emoji assets/skin/yellow.png"
  ];

  const mouthImages = [
    "emoji assets/mouth/open.png",
    "emoji assets/mouth/sad.png",
    "emoji assets/mouth/smiling.png",
    "emoji assets/mouth/straight.png",
    "emoji assets/mouth/surprise.png",
    "emoji assets/mouth/teeth.png"
  ];

  const eyeImages = [
    "emoji assets/eyes/closed.png",
    "emoji assets/eyes/laughing.png",
    "emoji assets/eyes/long.png",
    "emoji assets/eyes/normal.png",
    "emoji assets/eyes/rolling.png",
    "emoji assets/eyes/winking.png"
  ];
  
  // pick a random skin, mouth, and eye image
  const skinImage = createRandomImage(skinImages);
  const mouthImage = createRandomImage(mouthImages);
  const eyeImage = createRandomImage(eyeImages);
  
  // id for card based on skin, mouth, and eye image urls
  const cardId = `${skinImage.src}_${mouthImage.src}_${eyeImage.src}`;

  // check if this card has already been created twice
  if (cardCounts[cardId] >= 1) {
    // create a new set of images and try again
    return createCardHTML();
  }

  // if not update the card counts object and create card HTML
  if (cardCounts[cardId]) {
    cardCounts[cardId] += 1;
  } 
  else {
    cardCounts[cardId] = 1;
  }
  
  const cardFrontHTML = `
    <div class="cardFront">
        
    </div>
  `;
  
  const cardBackHTML = `
    <div class="cardBack">
      ${skinImage.outerHTML}
      ${mouthImage.outerHTML}
      ${eyeImage.outerHTML}
    </div>
  `;
  
  const cardInnerHTML = `
    <div class="cardInner">
      ${cardFrontHTML}
      ${cardBackHTML}
    </div>
  `;
  
  const cardHTML = `
    <div class="card">
      ${cardInnerHTML}
    </div>
  `;
  
  return cardHTML;
}

  

  
// array of container IDs for each card position
const containerIDs = [
  "cardPos1",
  "cardPos2",
  "cardPos3",
  "cardPos4",
  "cardPos5",
  "cardPos6",
  "cardPos7",
  "cardPos8",
  "cardPos9",
  "cardPos10"
];

// shuffle the cardPosIDs array randomly
shuffleArray(containerIDs);

// call createCardHTML and appendCardToContainer to create and append a card to each container
const cardsHTML = [];

for (let i = 0; i < 5; i++) {
  cardsHTML.push(createCardHTML());
}

for (let i = 0; i < 5; i++) {
  cardsHTML.push(cardsHTML[i]);
}

shuffleArray(cardsHTML);

for (let i = 0; i < containerIDs.length; i++) {
  const containerID = containerIDs[i];
  const cardHTML = cardsHTML[i];
  appendCardToContainer(containerID, cardHTML);
}


// function to append the card HTML code to the cards container in the HTML
function appendCardToContainer(containerID, cardHTML) {
  const container = document.getElementById(containerID);
  container.insertAdjacentHTML("afterbegin", cardHTML);
}

const cards = document.querySelectorAll(".card");
let flippedCards = [];
let matchedCards = [];
let score = 0;
let matchMultiplier = 10;
let timeMultiplier = 10;

// Start the timer when the page loads
let time = 0;
let timer = setInterval(function() {
  time++;
  let minutes = Math.floor(time / 60);
  let seconds = time % 60;
  document.getElementById("timer").innerHTML = `Time: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

  // decrement the time multiplier every 6 seconds
  if (time % 6 === 0 && timeMultiplier > 1) {
    timeMultiplier--;
  }

  updateScore();
}, 1000);

function updateScore() {
  document.getElementById("score").innerHTML = `Score: ${score}`;
}

function flipCard() {
  if (!this.classList.contains('flipped') && !this.classList.contains('matched')) {
    this.classList.add('flipped');
    flippedCards.push(this);

    // check for a match after 2 cards have been flipped
    if (flippedCards.length === 2) {
      const value1 = flippedCards[0].querySelectorAll('.cardBack img');
      const value2 = flippedCards[1].querySelectorAll('.cardBack img');
      if (value1.length !== value2.length) {
        // cards don't match, flip them back over
        setTimeout(function() {
          flippedCards.forEach(function(card) {
            card.classList.remove('flipped');
          });
          flippedCards = [];

          // decrement the match multiplier every time a pair doesn't match
          if (matchMultiplier > 1) {
            matchMultiplier--;
          }
        }, 1000);
      } else {
        // check if each image in the cards match
        let matched = true;
        for (let i = 0; i < value1.length; i++) {
          if (value1[i].src !== value2[i].src) {
            matched = false;
            break;
          }
        }
        if (matched) {
          flippedCards.forEach(function(card) {
            card.classList.add('matched');
            matchedCards.push(card);
          });
          flippedCards = []; // empty the flippedCards array

          // Check if all cards are matched and stop the timer
          if (matchedCards.length === cards.length) {
            clearInterval(timer);
            gameOver();
          }

          // increment the score by the match multiplier and time multiplier
          score += matchMultiplier * timeMultiplier;
          matchMultiplier = 5; // reset the match multiplier to 5
          timeMultiplier = Math.max(timeMultiplier - 1, 1); // decrement the time multiplier but make sure it's always at least 1
        } else {
          // cards don't match, flip them back over
          setTimeout(function() {
            flippedCards.forEach(function(card) {
              card.classList.remove('flipped');
            });
            flippedCards = [];

            // decrement the match multiplier every time a pair doesn't match
            if (matchMultiplier > 1) {
              matchMultiplier--;
            }
          }, 1000);
        }
      }
      updateScore();
    }
  }
}

function gameOver() {
  const gameOverScreen = document.getElementById('gameOver');
  gameOverScreen.style.display = 'block';
}

function submitScore() {
  // Get score value from the score div
  var score = document.getElementById('score').innerHTML;

  // Set score value as the value of the hidden input field
  document.getElementById('scoreInput').value = score;

  // Submit form
  document.querySelector('form').submit();
}

// Event listener to knwo when card is clicked
cards.forEach((card) => card.addEventListener("click", flipCard));
updateScore();
