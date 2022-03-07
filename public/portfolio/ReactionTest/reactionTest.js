//stopped working after I separated the JS from the HTML file for some reason...


let clickedTime; let createdTime; let reactionTime;

    

    function makeBox () {
        let colorArray = ["red", "blue", "green", "pink", "yellow", "orange", "black", "brown", "purple"];
        let randomColor = Math.random();
        randomColor = 9*randomColor;
        randomColor = Math.floor(randomColor);
        randomColor=colorArray[randomColor];

        // let dimensionArray = ["100", "150", "200", "250", "300", "350"];
        // let randomDimension = Math.random();
        // randomDimension = 6*randomDimension;
        // randomDimension = Math.floor(randomDimension);
        // randomDimension=dimensionArray[randomDimension];

        let shapeArray = ["50%", "0%"];
        let randomShape = Math.random();
        randomShape = 2*randomShape;
        randomShape = Math.floor(randomShape);
        randomShape=shapeArray[randomShape];

        let randomTimer=Math.random();
        randomTimer=5000*randomTimer;
        randomTimer=Math.floor(randomTimer);
        console.log(randomTimer);

        setTimeout(function() {

            let top = Math.random();
            top=top*300;
            let left = Math.random();
            left=left*500;

            document.getElementById("squareDiv").style.top=top+"px";
            document.getElementById("squareDiv").style.left=left+"px";
            document.getElementById("squareDiv").style.display="block";
            document.getElementById("squareDiv").style.background=randomColor;
            // document.getElementById("squareDiv").style.height=randomDimension;
            // document.getElementById("squareDiv").style.width=randomDimension;
            document.getElementById("squareDiv").style.borderRadius=randomShape;
            createdTime=Date.now();
        }, randomTimer);
        
    }

    makeBox();

    document.getElementById("squareDiv").onclick=function(){
                clickedTime=Date.now();
                reactionTime=(clickedTime-createdTime)/1000;
                this.style.display="none";
                document.getElementById("resultsDisplay").innerHTML="Your reaction time was "+reactionTime;
                makeBox();
            }