//ajaxURL = '//thor.net.nait.ca/~demo/cmpe2500/ica03Demo/webservice.php'; // if relative, no full path required..
ajaxURL = 'web.php'; // if relative, no full path required..

$( function(){ // equivalent of ready..
    $('#btnGetBooks').on("click", (ev) => GetBooks( true ));
    $('#btnUpdatePrice').on("click", function() { UpdatePrice() });
});

function getUsers(  ) // clearOut indicates to clear output panel
{
    let data = {};
    data["login"] = document.querySelector("#login").value; 
    postForm(
        "api/title.php",
        data,
        successCallback,
        errorCallback

    );
    AjaxRequest( 'GET', ajaxURL, sendData, 'json', ShowBooks, ErrorHandler );
}

function UpdatePrice()
{
    let sendData = {};
    sendData['action'] = 'update';
    sendData['filter'] = $("#filter").val();
    // ok, now send
    AjaxRequest( 'GET', ajaxURL, sendData, 'json', UpdateHandler, ErrorHandler ); // 
}

function UpdateHandler( data, AjaxStatus )
{
    $('#status').append( data['status'] + '</br>' );
    GetBooks( false );
}

function ShowBooks( data, AjaxStatus )
{
    console.log( data );
    let out = $("#out"); // expensive, save unless modifying
    let retData = data['jsonData']; // save array reference

    // populate our grid
    out.empty();
    if( retData.length < 1 )
        return;
    // How much data do I have ? count of the properties of the data []
    // could for-in with counter
    let numProps = Object.keys( retData[0] ).length; // shorter version
    out.css("grid-template-columns", `repeat(${numProps}, max-content )`);
    for ( key in retData[0]) {
        // key populates with each property of my data
        let d = document.createElement("div");
        d.classList.add('dHead');
        d.append( document.createTextNode(key));
        out.append( d ); // add each header div as it is made
    }
    // fill the data
    for (let i = 0; i < retData.length; i++) {
        // NOT required - const element = retData[i]; // copy if modified elsewhere
        for (const key in retData[i]) { // key gets each PROPERTY NAME not value
            let d = document.createElement("div");
            d.append( document.createTextNode(retData[i][key]));
            out.append( d );
            console.log(retData[i][key]);
        }
    }

    let status = $("#status"); // first instance of status.. but id so only too
    status.append( data['status'] + "</br>");
}

function ErrorHandler( data, AjaxStatus )
{
    console.log( AjaxStatus );
    console.log( data );
}