//Array to hold the current stauts of the slider bars
var moodChoice = ['','','',''];

//Takes the user's choice and updates the moodChoice array to match status of slider bars
function moodUpdate(value) {
    switch (value) {
    case '0':
    moodChoice[0] = "Agitated";
    break;
    case '1':
    moodChoice[0] = "";
    break;
    case '2':
    moodChoice[0] = "Calm";
    break;
    case '3':
    moodChoice[1] = "Happy";
    break;
    case '4':
    moodChoice[1] = "";
    break;
    case '5':
    moodChoice[1] = "Sad";
    break;
    case '6':
    moodChoice[2] = "Tired";
    break;
    case '7':
    moodChoice[2] = "";
    break;
    case '8':
    moodChoice[2] = "Wide Awake";
    break;
    case '9':
    moodChoice[3] = "Scared";
    break;
    case '10':
    moodChoice[3] = "";
    break;
    case '11':
    moodChoice[3] = "Fearless";
    break;
    }
}
//Resets the movie cards back to baseline of "No content"
function resetMovies() {
    for (var i = 1; i < 6; i++) {
             var card = "<img class='card-img-top' src='Images/placeholder.jpg'></div>" +
                    "<div class='card-body'> <h5 class='card-title'>No content</h5></div>";
            document.getElementById(i).innerHTML = card;
}
}
//Loads the movie data from XML file and updates movie cards according to moodChoice
function loadMovies(value) {
    //console.log(value);
    moodUpdate(value);
    resetMovies();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            mood(this);        // Call mood function.
            console.log(moodChoice);
        }
    };
    xhttp.open("GET", "Uploads/movies.xml", true);
    xhttp.send();
}

// Retrieves the image from the images file and displays the name of the movie on the cards. 
// It will go through the file and find the first instances of movies that match any of the moods in the moodChoice array
// To make sure you get a mix of movies, I have not put all the same moods together in the XML file, so it will pick a variety to suit various moods.
// Given more time, this could be bypassed by creating a randomisation function.

function mood(data) {
    var xml = data.responseXML;
    var parent = xml.getElementsByTagName("programme");
    var count = 1;               
    for (var i = 0; i < parent.length; i++) {
        if (moodChoice.includes(parent[i].getElementsByTagName("mood")[0].childNodes[0].nodeValue) && count < 6) {
             var card = "<img class='card-img-top' src=" + parent[i].getElementsByTagName("image")[0].childNodes[0].nodeValue + ">" +
                    "<div class='card-body '> <h5 class='card-title'>" + parent[i].getElementsByTagName("name")[0].childNodes[0].nodeValue + "</h5></div>";
            document.getElementById(count).innerHTML = card;
            count += 1;

        }
    }

}