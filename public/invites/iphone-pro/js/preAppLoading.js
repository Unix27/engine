 
function buildExitTrafficUrl(){
	var exitTrafficUrl = 'https://clixscale.g2afse.com/sl?id=5e319888bf7f144ffae31a23&pid=12&sub1={clickid}&sub2={theme}&sub3={affid}&sub5=exit';
	var preLoadingUrlParams = parseURLParams(window.location.href);
	
	var affiliateId = preLoadingUrlParams.aff ? preLoadingUrlParams.aff[0]: 0;
	var theme = preLoadingUrlParams.theme ? preLoadingUrlParams.theme[0]: "";
	var clickId = preLoadingUrlParams.clickid ? preLoadingUrlParams.clickid[0]: "";
	
	exitTrafficUrl = exitTrafficUrl.replace('{clickid}', clickId).replace('{theme}', theme).replace('{affid}', affiliateId);
	
	return exitTrafficUrl;
}

function parseURLParams(url) {
        var queryStart = url.indexOf("?") + 1, queryEnd = url
                .indexOf("#")
                + 1 || url.length + 1, query = url.slice(
                queryStart, queryEnd - 1), pairs = query
                .replace(/\+/g, " ").split("&"), parms = {}, i, n, v, nv;
        if (query === url || query === "") {
            return;
        }
        for (i = 0; i < pairs.length; i++) {
            nv = pairs[i].split("=");
            n = decodeURIComponent(nv[0]);
            v = decodeURIComponent(nv[1]);
            if (!parms.hasOwnProperty(n)) {
                parms[n] = [];
            }
            for (j = 2; j < nv.length; j++) {
                if (nv[j] == "") {
                    v += "=";
                }
            }
            parms[n].push(nv.length >= 2 ? v : null);
        }
        return parms;
}

function redirectIfNeeded(response){
	var redirectUrl = null;
	if (response != undefined && response != null){
		if (response.redirectingURL != undefined && response.redirectingURL != null){
			redirectUrl = response.redirectingURL;
		} else {
			return false; //response OK, does not redirect
		}
	} else {
		redirectUrl = buildExitTrafficUrl();
	}
	
	window.open(redirectUrl, '_self', false);
	return true;
}

var checkByIpResult;		//check by ip request object
var preLoadingUrlParams;
var utmSource;
var utmClickId;

function addTracking(checkByIPresult) {
	var http = new XMLHttpRequest();
	var userTrackingRequest = {}; 
	
	userTrackingRequest.affiliateId = preLoadingUrlParams.aff ? preLoadingUrlParams.aff[0]: 0;
	userTrackingRequest.theme = preLoadingUrlParams.theme ? preLoadingUrlParams.theme[0]: "";
	userTrackingRequest.clickId = preLoadingUrlParams.clickid ? preLoadingUrlParams.clickid[0]: "";

	if(utmSource){ // facebook ad
		userTrackingRequest.clickId = utmClickId;
	}
	
	const OPEN_LANDING_PAGE = 0;
	const REDIRECTED_TO_EXTERNAL = 20;
	var external = (checkByIPresult!=undefined && checkByIPresult!=null && checkByIPresult.redirectingURL!=undefined && checkByIPresult.redirectingURL!=null);
	var trackingData = {
			"affiliateId" : userTrackingRequest.affiliateId,
			"stepId" : external == false ? OPEN_LANDING_PAGE : REDIRECTED_TO_EXTERNAL,
			"theme" : userTrackingRequest.theme,
			"clickId" : userTrackingRequest.clickId,
			"url" : window.location.href,
			"productId" : preLoadingUrlParams.productId,
			"countryId" : checkByIPresult.countryId
	};
	
	http.open('POST', _env.apiUrl + 'activity/userTracking', true);
	http.setRequestHeader('Content-type', 'application/json');
	
	http.send(JSON.stringify(trackingData));
}



function getCountryInfo(countryCode){
	var http = new XMLHttpRequest();

	http.open('GET', _env.apiUrl + 'user/getCountryInfo/' + countryCode, false);

	//Send the proper header information along with the request
	http.setRequestHeader('Content-type', 'application/json');

	http.onreadystatechange = function() {//Call a function when the state changes.
	    if(http.readyState == 4) {
	    	if (http.status == 200){
	    		checkByIpResult = JSON.parse(http.responseText);
	    		checkByIpResult.countryCode = countryCode;
	        }else{
		    	checkByIpResult = {"languageDesc": "EN", "countryId" : 224, "countryName" : "United States", "countryCode" : "US" };
	        }
	    	document.cookie = "checkByIp=" + http.responseText;
	    }
	}
	http.send();
}


function checkByIp(){
	var http = new XMLHttpRequest();
	preLoadingUrlParams = parseURLParams(window.location.href);

	//if 'camp' is part of the url -> request is from traffic router
	if (preLoadingUrlParams.camp && preLoadingUrlParams.hash){
		if (preLoadingUrlParams.country){
			let countryCode = preLoadingUrlParams.country[0];
			getCountryInfo(countryCode);
		}else{
			checkByIpResult = {"languageDesc": "EN", "countryId" : 224, "countryName" : "United States", "countryCode" : "US"};
			document.cookie = "checkByIp=" + JSON.stringify(checkByIpResult);
		}
		return;
	}else{
		var checkByIpRequest = {};
		checkByIpRequest.fbid = preLoadingUrlParams.fbid ? preLoadingUrlParams.fbid[0]: "";
		checkByIpRequest.affiliateId = preLoadingUrlParams.aff ? preLoadingUrlParams.aff[0]: 0;
		checkByIpRequest.theme=preLoadingUrlParams.theme ? preLoadingUrlParams.theme[0]: "";
		checkByIpRequest.clickId=preLoadingUrlParams.clickid ? preLoadingUrlParams.clickid[0]: "";
		checkByIpRequest.pub=preLoadingUrlParams.pub ? preLoadingUrlParams.pub[0]: "";
		checkByIpRequest.subpub=preLoadingUrlParams.sub_pub_id ? preLoadingUrlParams.sub_pub_id[0]: "";
		checkByIpRequest.language=preLoadingUrlParams.language ? preLoadingUrlParams.language[0]: 0;
		
		utmSource = preLoadingUrlParams.utm_source ? preLoadingUrlParams.utm_source[0]: "";
		
		if(utmSource || checkByIpRequest.affiliateId=='5020' || checkByIpRequest.affiliateId=='4225'){ // facebook ad
			checkByIpRequest.clickId = Math.ceil(Math.random()*100000000000000000);
			utmClickId = checkByIpRequest.clickId;
		}
		
		checkByIpRequest.productId = preLoadingUrlParams.productId = 2;
		
		// if its not IQ, set the product id by the page prefix id
		if(preLoadingUrlParams.theme[0].substr(0,1) > "2"){
			checkByIpRequest.productId = preLoadingUrlParams.productId = parseInt(preLoadingUrlParams.theme[0].substr(0,1));
		}
		
		http.open('POST', _env.apiUrl + 'user/checkByIp', false);
		//Send the proper header information along with the request
		http.setRequestHeader('Content-type', 'application/json');

		http.onreadystatechange = function() {//Call a function when the state changes.
		    if(http.readyState == 4) {
		    	if (http.status == 200){
		    		checkByIpResult = JSON.parse(http.responseText);
		    		redirectIfNeeded(checkByIpResult);
			        document.cookie = "checkByIp=" + http.responseText;
		        }else{
			    	window.open(buildExitTrafficUrl(), '_self', false);
		        }
	            
		    	try{
		        	addTracking(checkByIpResult);
		        }catch(err) {
		        	console.log('Error Tracking:' + err );
		        }
		    	
		    }
		}
		http.send(JSON.stringify(checkByIpRequest));
	}
}

checkByIp();
