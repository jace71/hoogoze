function printDymo(){
			 var labelXml = '<DieCutLabel Version="8.0" Units="twips"><PaperOrientation>Portrait</PaperOrientation>';
			 labelXml = labelXml + '<Id>Address</Id><PaperName>30256 Shipping</PaperName>';
			 labelXml = labelXml + '<DrawCommands/><ObjectInfo><TextObject><Name>Text</Name>';
			 labelXml = labelXml + '<ForeColor Alpha="255" Red="0" Green="0" Blue="0" />';
			 labelXml = labelXml + '<BackColor Alpha="0" Red="255" Green="255" Blue="255" />';
			 labelXml = labelXml + '<LinkedObjectName></LinkedObjectName><Rotation>Rotation0</Rotation>';
			 labelXml = labelXml + '<IsMirrored>False</IsMirrored><IsVariable>True</IsVariable>';
			 labelXml = labelXml + '<HorizontalAlignment>Left</HorizontalAlignment>';
			 //labelXml = labelXml + '<TextAlignment>Left</TextAlignment>';
			 //labelXml = labelXml + '<TextVerticalAlignment>Top</TextVerticalAlignment>';
			 labelXml = labelXml + '<VerticalAlignment>Top</VerticalAlignment><TextFitMode>None</TextFitMode>';
			 labelXml = labelXml + '<UseFullFontHeight>True</UseFullFontHeight><Verticalized>False</Verticalized>';
			 labelXml = labelXml + '<StyledText/></TextObject><Bounds X="300" Y="550" Width="5240" Height="6040" />';// x=332 y=150 width=1050 height=675
			 //labelXml = labelXml + '</TextObject>';
			 labelXml = labelXml + '</ObjectInfo></DieCutLabel>';
			 //labelXml = labelXml + '<ObjectInfo><ImageObject><Name>Troy Kids Logo</Name>';
			 //labelXml = labelXml + '<ImageLocation>http://www.hoogoze.com/hoogoze/images/Troy-Kids-logo.jpg</ImageLocation>';
			 //labelXml = labelXml + '<HorizontalAlignment>Center</HorizontalAlignment><VerticalAlignment>Top</VerticalAlignment>';
			 //labelXml = labelXml + '</ImageObject></ObjectInfo></DieCutLabel>'
			/*
			<ObjectInfo>
536         <ImageObject>
537             <Name>GoogleLogo</Name>
538             <ForeColor Alpha="255" Red="0" Green="0" Blue="0" />
539             <BackColor Alpha="0" Red="255" Green="255" Blue="255" />
540             <LinkedObjectName></LinkedObjectName>
541             <Rotation>Rotation0</Rotation>
542             <IsMirrored>False</IsMirrored>
543             <IsVariable>False</IsVariable>
544             <ImageLocation>http://www.google.com/intl/en_ALL/images/logo.gif</ImageLocation>
546             <ScaleMode>Uniform</ScaleMode>
547             <BorderWidth>0</BorderWidth>
548             <BorderColor Alpha="255" Red="0" Green="0" Blue="0" />
549             <HorizontalAlignment>Center</HorizontalAlignment>
550             <VerticalAlignment>Center</VerticalAlignment>
551         </ImageObject>
552         <Bounds X="3465" Y="2292.90002441406" Width="1905.34887695313" Height="375" />
553     </ObjectInfo>
			*/
			var label = dymo.label.framework.openLabelXml(labelXml);
			//var labelSet = new dymo.label.framework.LabelSetBuilder();			
			
			$('.wrapper').each(function(){
				//var record = labelSet.addRecord();
				var dymoName = $('.label-name .content',this).text().trim();
				var dymoAllergies = $('.label-alergies .content',this).text().trim();
				var dymoId = $('.label-id .content',this).text().trim();
				if ($('.for-infants',this).length > 0) {
					var dymoFeedTime = $('.feeding-time .content',this).text().trim();
					var dymoOzs = $('.ozs .content',this).text().trim();
				} else {
					var dymoFeedTime = '';
					var dymoOzs = '';
				}
				var dymoSpecInstructions = $('.label-instructions .content',this).text().trim();
				var dymoDate = $('.label-date .content',this).text().trim();
				
				var labelHtml = 'Name:\n' + dymoName + '\n\nAllergies:\n' + dymoAllergies + '\n\nID: ' + dymoId + '\n\nFeed Time: ' + dymoFeedTime + '\nOzs.: ' + dymoOzs;
				labelHtml = labelHtml + '\nSpecial Insctructions:\n' + dymoSpecInstructions + '\n\nDate:\n' + dymoDate;
				label.setObjectText("Text", labelHtml);
				//record.setTextMarkup('Text', labelHtml);
				//console.log('HTML: ' + labelHtml);
				
				var printers = dymo.label.framework.getPrinters();
				if (printers.length == 0) {
					throw "No DYMO printers are installed. Install DYMO printers.";
				} else {
					//console.log("Printer length = " + printers.length);
				}

				var printerName = "";
				for (var i = 0; i < printers.length; ++i)
				{
					var printer = printers[i];
					if (printer.printerType == "LabelWriterPrinter")
					{
						printerName = printer.name;
						break;
					}
				}
				label.print(printerName);
			});
			
/* 			var printers = dymo.label.framework.getPrinters();
			if (printers.length == 0) {
				throw "No DYMO printers are installed. Install DYMO printers.";
			} else {
				console.log("Printer length = " + printers.length);
			}

			var printerName = "";
			for (var i = 0; i < printers.length; ++i)
			{
				var printer = printers[i];
				if (printer.printerType == "LabelWriterPrinter")
				{
					printerName = printer.name;
					break;
				}
			}
			label.print(printerName); */
			
/* 			var labelHtml = document.getElementById('label-name');
			labelHtml = labelHtml.innerHTML;
			
			label.setObjectText("Text", labelHtml);
			
			var printers = dymo.label.framework.getPrinters();
			if (printers.length == 0) {
				throw "No DYMO printers are installed. Install DYMO printers.";
			} else {
				console.log("Printer length = " + printers.length);
			}

			var printerName = "";
			for (var i = 0; i < printers.length; ++i)
			{
				var printer = printers[i];
				if (printer.printerType == "LabelWriterPrinter")
				{
					printerName = printer.name;
					break;
				}
			}
			label.print(printerName); */
		}