
    function calcMag() {
        var tel_focal_length = parseInt(document.getElementById("calcMagFL").value);
        var ep_focal_length = parseInt(document.getElementById("calcMagEPFL").value);
        var barlowMagFactor = parseInt(document.getElementById("barlowMagFactorValue").value);
        var magCalcResult = Math.floor(tel_focal_length/ep_focal_length) * barlowMagFactor;

        document.getElementById("magCalcResultBox").value = magCalcResult;
        
    }
    