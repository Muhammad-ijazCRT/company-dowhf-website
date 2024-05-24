document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll("img").forEach(function(imgElement) {
        let imageUrl = imgElement.getAttribute("src");
        let cachedImage = localStorage.getItem(imageUrl);
        if (cachedImage) {
            imgElement.setAttribute("src", cachedImage);
        } else {
            let xhr = new XMLHttpRequest;
            xhr.open("GET", imageUrl, true);
            xhr.responseType = "blob";
            xhr.onload = function() {
                if (xhr.status === 200) {
                    let imageBlob = xhr.response;
                    let fileReader = new FileReader;
                    fileReader.onload = function() {
                        let dataUrl = fileReader.result;
                        localStorage.setItem(imageUrl, dataUrl);
                        imgElement.setAttribute("src", dataUrl);
                    };
                    fileReader.readAsDataURL(imageBlob);
                }
            };
            xhr.send();
        }
    });
});




document.addEventListener("DOMContentLoaded", function() {
    // Cache CSS files
    document.querySelectorAll("link[cache-files='cached']").forEach(function(linkElement) {
        let cssUrl = linkElement.getAttribute("href");
        let cachedCSS = localStorage.getItem(cssUrl);
        if (cachedCSS) {
            // If cached, apply the cached CSS text to the link element
            linkElement.textContent = cachedCSS;
        } else {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", cssUrl, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    let cssText = xhr.responseText;
                    localStorage.setItem(cssUrl, cssText);
                    linkElement.textContent = cssText;
                }
            };
            xhr.send();
        }
    });

    // Cache JS files
    document.querySelectorAll("script[cache-files='cached']").forEach(function(scriptElement) {
        let jsUrl = scriptElement.getAttribute("src");
        let cachedJS = localStorage.getItem(jsUrl);
        if (cachedJS) {
            // If cached, create a new script element with the cached JS code
            let newScriptElement = document.createElement("script");
            newScriptElement.textContent = cachedJS;
            scriptElement.parentNode.replaceChild(newScriptElement, scriptElement);
        } else {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", jsUrl, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    let jsText = xhr.responseText;
                    localStorage.setItem(jsUrl, jsText);

                    // Create a new script element to execute the cached JS
                    let newScriptElement = document.createElement("script");
                    newScriptElement.textContent = jsText;
                    scriptElement.parentNode.replaceChild(newScriptElement, scriptElement);
                }
            };
            xhr.send();
        }
    });
});

