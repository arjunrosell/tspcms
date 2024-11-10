
<style>
    .clickable-image {
        transition: transform 0.2s; 
        cursor: pointer; 
    }

    .clickable-image:hover {
        transform: scale(1.05); 
    }

    .modal {
        display: none; 
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgba(0, 0, 0, 0.9);
        margin-top: 66px;
    }

    .modal-content {
        margin: auto;
        display: block;
        width: 80%; 
        max-width: 700px; 
        transition: transform 0.2s; 
    }

    .close_{{$index}} {
        position: absolute;
        top: 15px;
        right: 35px;
        color: white;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close_{{$index}} :hover,
    .close_{{$index}} :focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    .zoom-btn  {
        position: absolute;
        top: 10px;
        background-color: rgba(255, 255, 255, 0.8);
        border: none;
        padding: 10px;
        cursor: pointer;
        margin: 5px;
        border-radius: 5px;
    }

    .zoom-btn :hover {
        background-color: rgba(255, 255, 255, 1);
    }

    .zoom-in {
        left: 50px;
    }

    .zoom-out  {
        left: 150px;
    }
</style>
</head>
<body>

<div>
<button id="myImage_{{$index}}" class="flex items-center gap-2 px-3 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
        <path d="M12 4.5C6.5 4.5 2 12 2 12s4.5 7.5 10 7.5 10-7.5 10-7.5-4.5-7.5-10-7.5zm0 11.25c-2.03 0-3.75-1.72-3.75-3.75S9.97 8.25 12 8.25 15.75 10 15.75 12 14.03 15.75 12 15.75zM12 10.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z"/>
    </svg>    
    View Image
</button>
</div>

<div id="myModal_{{$index}}" class="modal">
<span class="close_{{$index}}">&times;</span>
<img class="modal-content" id="img01_{{$index}}" alt="Image">
<div id="caption_{{$index}}"></div>
<button class="zoom-btn zoom-in" id="zoomIn_{{$index}}">Zoom In</button>
<button class="zoom-btn zoom-out" id="zoomOut_{{$index}}">Zoom Out</button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
var modal = document.getElementById("myModal_"+{{$index}});
var img = document.getElementById("myImage_"+{{$index}});
var modalImg = document.getElementById("img01_"+{{$index}});
var scale = 1;

// Change this to the actual image URL
var imageUrl = "{{ asset($files) }}"; 

img.onclick = function() {
    modal.style.display = "block";
    modalImg.src = imageUrl; // Set the image source
    scale = 1; 
    modalImg.style.transform = "scale(" + scale + ")";
}

var span = document.getElementsByClassName("close_"+{{$index}})[0];
span.onclick = function() {
    modal.style.display = "none";
}

document.getElementById("zoomIn_"+{{$index}}).onclick = function() {
    scale += 0.1; 
    modalImg.style.transform = "scale(" + scale + ")";
}

document.getElementById("zoomOut_"+{{$index}}).onclick = function() {
    if (scale > 0.1) { 
        scale -= 0.1; 
        modalImg.style.transform = "scale(" + scale + ")";
    }
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
});
</script>

