<!DOCTYPE html>
<html>
<head>
    <title>Drive API Quickstart</title>
    <meta charset='utf-8' />
</head>
<body>
<p>Drive API Quickstart</p>

<pre id="content"></pre>

<iframe width="420" height="315"
        src="https://drive.google.com/file/d/0B7o0Vx20V9IcYWZ5M2VYUFVnRVE/preview?usp=drivesdk" id="gg">
</iframe>

<script type="text/javascript">
    // Client ID and API key from the Developer Console
    var CLIENT_ID = '563470205636-ekndcnkgg4iob1o5tkehs9r67l132svv.apps.googleusercontent.com';
    var API_KEY = 'AIzaSyA_F290Fj8IZGjv0Yc4RiRyiPBc0X5arFg';
    // Array of API discovery doc URLs for APIs used by the quickstart
    var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/drive/v3/rest"];

    // Authorization scopes required by the API; multiple scopes can be
    // included, separated by spaces.
    var SCOPES = 'https://www.googleapis.com/auth/drive';
    /**
     *  On load, called to load the auth2 library and API client library.
     */
    function handleClientLoad() {
        gapi.load('client:auth2', initClient);
    }

    /**
     *  Initializes the API client library and sets up sign-in state
     *  listeners.
     */
    function initClient() {
        gapi.client.init({
            apiKey: API_KEY,
            discoveryDocs: DISCOVERY_DOCS,
            clientId: CLIENT_ID,
            scope: SCOPES
        }).then(function () {
//            gapi.auth2.getAuthInstance().signIn();
            // Listen for sign-in state changes.
//            gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);
//
//            // Handle the initial sign-in state.
            updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
        });
    }

    /**
     *  Called when the signed in status changes, to update the UI
     *  appropriately. After a sign-in, the API is called.
     */
    function updateSigninStatus(isSignedIn) {
        if (isSignedIn) {
//            console.log(1);
            listFiles();
        }
    }
    /**
     * Append a pre element to the body containing the given message
     * as its text node. Used to display the results of the API call.
     *
     * @param {string} message Text to be placed in pre element.
     */
    function appendPre(message) {
        var pre = document.getElementById('content');
        var textContent = document.createTextNode(message + '\n');
        pre.appendChild(textContent);
    }

    /**
     * Print files.
     */
    function appendVideo(url){
        var pre = document.getElementById('gg');
        pre.src = url;
    }
    function listFiles() {
        gapi.client.request({
            'path': '/drive/v2/files/'+'0B7o0Vx20V9IcS192QTlOeU5oREk'+'/children',
            'method' : 'GET',
        }).then(function (response) {
            var videos = response.result.items;
            if(videos &&videos.length > 0)
            {
                for(var i= 0;i< videos.length;i++)
                {
                    var video = videos[i];
                    var videoId = video.id;
                    gapi.client.request({
                        'path' : 'https://www.googleapis.com/drive/v2/files/'+videoId,
                        'method' : 'GET',
                    }).then(function (response) {
//                        console.log(response);
                    })
                }
            }
        })
    }

</script>
<script async defer src="https://apis.google.com/js/api.js"
        onload="this.onload=function(){};handleClientLoad()"
        onreadystatechange="if (this.readyState === 'complete') this.onload()">
</script>
</body>
</html>