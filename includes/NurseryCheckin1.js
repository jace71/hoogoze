function printDymo() {

	// load xml template
 /*	$.ajax({
		type: "GET",
		url: '../includes/NurseryCheckin.xml',
		dataType: 'xml',
		success: function(xml) {
			var labelXml = xml;
			console.log(xml);
		}
	}) */
	
	$.get('../includes/NurseryCheckin.label', function(xml) {
		var label = dymo.label.framework.openLabelXml(xml);
		//console.log(label);
	

		//var label = dymo.label.framework.openLabelXml(labelXml);
		//var labelSet = new dymo.label.framework.LabelSetBuilder();			

		$('.wrapper').each(function() {
			//var record = labelSet.addRecord();
			var dymoName = $('.label-name .content', this).text().trim();
			var dymoAllergies = $('.label-alergies .content', this).text().trim();
			var dymoId = $('.label-id .content', this).text().trim();
			if ($('.for-infants', this).length > 0) {
				var dymoFeedTime = $('.feeding-time .content', this).text().trim();
				var dymoOzs = $('.ozs .content', this).text().trim();
			} else {
				var dymoFeedTime = '';
				var dymoOzs = '';
			}
			var dymoSpecInstructions = $('.label-instructions .content', this).text().trim();
			var dymoDate = $('.label-date .content', this).text().trim();

			//var labelHtml = 'Name:\n' + dymoName + '\n\nAllergies:\n' + dymoAllergies + '\n\nID: ' + dymoId + '\n\nFeed Time: ' + dymoFeedTime + '\nOzs.: ' + dymoOzs;
			//labelHtml = labelHtml + '\nSpecial Insctructions:\n' + dymoSpecInstructions + '\n\nDate:\n' + dymoDate;
			label.setObjectText("NameVar", dymoName);
			label.setObjectText("AllergiesVar", dymoAllergies);
			label.setObjectText("SpecInstrText", dymoSpecInstructions);
			label.setObjectText("FeedTimeText", dymoFeedTime);
			label.setObjectText("OzsText", dymoOzs);
			label.setObjectText("DateText", dymoDate);
			label.setObjectText("IDText", dymoId);


			var printers = dymo.label.framework.getPrinters();
			if (printers.length == 0) {
				throw "No DYMO printers are installed. Install DYMO printers.";
			} else {
				//console.log("Printer length = " + printers.length);
			}

			var printerName = "";
			for (var i = 0; i < printers.length; ++i) {
				var printer = printers[i];
				if (printer.printerType == "LabelWriterPrinter") {
					printerName = printer.name;
					break;
				}
			}
			label.print(printerName);
		}); // end $.each function
	
		
	}); // end $.get function

}