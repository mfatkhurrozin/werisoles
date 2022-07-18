< !–
        function startCalculate() {
            interval = setInterval(“Calculate()”, 10);
        }
        
        function Calculate() {
            var a = document.form1.harga_perunit.value;
            var b = document.form1.diskon.value;
            var c = document.form1.jml_barang.value
            document.form1.total.value = (a * c) - (a * c * (b / 100));
        }

        function stopCalc() {
            clearInterval(interval);
        }
		//–>