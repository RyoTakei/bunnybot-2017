var baseLinePoints = 10;
var fieldBucketPoints = 40;
var teamBucketPoints = 20;
var bunniesPoints = 10;

function basePoints(){
    if (document.getElementById("baseLine").checked){
        return baseLinePoints;
    }
    return 0;
}

function fieldBucket(){
    if (document.getElementById('teamBucket').checked){
        return teamBucketPoints;
    }
    return 0;
}

function teamBucket(){
    if (document.getElementById('fieldBucket').checked){
        return fieldBucketPoints;
    }
    return 0;
}

function autonomous() {
    if (basePoints() + fieldBucket() + teamBucket() >= 50){
        return 50;
    }
    else {
        return basePoints() + fieldBucket() + teamBucket();
    }
}

function teleop() {
    var score = (parseInt(document.getElementById('bunnies').value));
    return score * bunniesPoints;
}

function finalScore(){
    return autonomous() + teleop();
}

function onClick() {
    if (!isNaN(finalScore())){
        alert("They scored " + finalScore() + " points");
        // document.getElementById("scoreBox").value = "They scored " + finalScore() + " points"
    } else {
        alert("There's an error.... Make sure you don't have illegal characters")
    }
}