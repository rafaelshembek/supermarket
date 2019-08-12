export { getGeolocation }

const getGeolocation = () => {
    if("geolocation" in navigator){
        // code here!

        var myGeolocation = navigator.geolocation;
            return myGeolocation;
    }else{
        console.group(" >>>> Aviso! <<<< ");
        console.info("a função geolocation não tem suporte ao seu navegador");
        console.groupEnd();
    }
}