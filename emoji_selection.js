var lastClickedImageSrc = null;

function openFeature(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

function displayEmojiSkin(imageSrc) {
    // Set source of current players emoji image to a new image
    document.getElementById("skin-image").src = imageSrc;
                
    const input = document.querySelector('input[name="finalSkin"]');

    // Update the value of input element
    input.value = imageSrc;

    // Update the last clicked image source
    lastClickedImageSrc = imageSrc;
}
            
function displayEmojiMouth(imageSrc) {
    // Set source of current players emoji image to a new image
    document.getElementById("mouth-image").src = imageSrc;
                
    const input = document.querySelector('input[name="finalMouth"]');

    //Update value of input element
    input.value = imageSrc;
                
    // Update last clicked image source
    lastClickedImageSrc = imageSrc;
} 

function displayEmojiEye(imageSrc) {
    // Set source of current players emoji image to a new image
    document.getElementById("eye-image").src = imageSrc;
                
    const input = document.querySelector('input[name="finalEye"]');

    //Update value of input element
    input.value = imageSrc;
                
    // Update last clicked image source
    lastClickedImageSrc = imageSrc;
}

