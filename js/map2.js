	  dojo.require("esri.map");
      dojo.require("esri.toolbars.draw");
      dojo.require("dijit.dijit"); // optimize: load dijit layer
      dojo.require("dijit.layout.BorderContainer");
      dojo.require("dijit.layout.ContentPane");
      dojo.require("esri.dijit.Popup");
      dojo.require("esri.dijit.InfoWindow");
      
      var map, toolbar, symbol;
      var geoms = [];
      var count = 0;
      var hexlayer;
      var hexvalues = new Array();
      var id = null;

      function init() {
        var initExtent = new esri.geometry.Extent({"xmin":-119.925,"ymin":34.3777,"xmax":-119.626,"ymax":34.4669,"spatialReference":{"wkid":4326}});
        
        var popup = new esri.dijit.Popup({
          fillSymbol: new esri.symbol.SimpleFillSymbol(esri.symbol.SimpleFillSymbol.STYLE_SOLID, new esri.symbol.SimpleLineSymbol(esri.symbol.SimpleLineSymbol.STYLE_SOLID, new dojo.Color([255,0,0]), 2), new dojo.Color([255,255,0,0.25]))
        }, dojo.create("div"));
        map = new esri.Map("map",{
          extent:esri.geometry.geographicToWebMercator(initExtent),
          infoWindow:popup
        });
        dojo.addClass(map.infoWindow.domNode, "myTheme");
        
        // dojo.connect(map, "onLoad", createToolbar);
        dojo.connect(map, 'onLoad', function(theMap) { 
          //resize the map when the browser resizes
            dojo.connect(dijit.byId('map'), 'resize', map,map.resize);
			map.disableKeyboardNavigation();
			dojo.connect(map, "onClick", myGraphicsClickHandler);
			// toolbar.activate(esri.toolbars.Draw.POLYGON);
        });
        
        //Add the topographic layer to the map. View the ArcGIS Online site for services http://arcgisonline/home/search.html?t=content&f=typekeywords:service    
        var basemap = new esri.layers.ArcGISTiledMapServiceLayer("http://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer");
        
        // dojo.connect(map,"onLoad", function(map) {map.infoWindow.resize(250, 100);} );
        map.addLayer(basemap);
        
        hexlayer = new esri.layers.GraphicsLayer();
        map.addLayer(hexlayer);
        
        var popupTemplate = new esri.dijit.PopupTemplate({
		    title: "1"
		  });
        
        $('#map').bind("contextmenu",function(e){
              return false;
        });
        drawHex();
        
      }
      
      function myGraphicsClickHandler(evt) {
			if (evt.graphic) {
				map.infoWindow.setTitle("Rank Region");
				id = evt.graphic.attributes.id;
        		var content = "<table><tr><td style='width:70px;text-align:center'>Strongly<br/>Disagree</td><td style='width:70px;text-align:center'></td><td style='width:70px;text-align:center'></td><td style='width:70px;text-align:center'></td><td style='width:70px;text-align:center'></td><td style='width:70px;text-align:center'>Neutral</td><td style='width:70px;text-align:center'></td><td style='width:70px;text-align:center'></td><td style='width:70px;text-align:center'></td><td style='width:70px;text-align:center'></td><td style='width:70px;text-align:center'>Strongly<br/>Agree</td></tr>";
        		content += "<tr><td style='width:70px;text-align:center'>-5</td><td style='width:70px;text-align:center'></td><td style='width:70px;text-align:center'></td><td style='width:70px;text-align:center'></td><td style='width:70px;text-align:center'></td><td style='width:70px;text-align:center'>0</td><td style='width:70px;text-align:center'></td><td style='width:70px;text-align:center'></td><td style='width:70px;text-align:center'></td><td style='width:70px;text-align:center'></td><td style='width:70px;text-align:center'>5</td></tr>";
        		
        		content += "<tr><td style='width:70px;text-align:center'><input type='radio' onclick='getRadioValue(id);' name='gm' value='-5'/></td><td style='width:70px;text-align:center'><input type='radio' onclick='getRadioValue(id);' name='gm' value='-4'/></td><td style='width:70px;text-align:center'><input type='radio' onclick='getRadioValue(id);' name='gm' value='-3'/></td><td style='width:70px;text-align:center'><input type='radio' onclick='getRadioValue(id);' name='gm' value='-2'/></td><td style='width:70px;text-align:center'><input type='radio' onclick='getRadioValue(id);' name='gm' value='-1'/></td><td style='width:70px;text-align:center'><input type='radio' onclick='getRadioValue(id);' name='gm' value='0'/></td>";
        		content += "<td style='width:70px;text-align:center'><input type='radio' onclick='getRadioValue(id);' name='gm' value='1'/></td><td style='width:70px;text-align:center'><input type='radio' onclick='getRadioValue(id);' name='gm' value='2'/></td><td style='width:70px;text-align:center'><input type='radio' onclick='getRadioValue(id);' name='gm' value='3'/></td><td style='width:70px;text-align:center'><input type='radio' onclick='getRadioValue(id);' name='gm' value='4'/></td><td style='width:70px;text-align:center'><input type='radio' onclick='getRadioValue(id);' name='gm' value='5'/></td></tr></table>";
        		map.infoWindow.setContent(content);
        		map.infoWindow.show(evt.mapPoint,map.getInfoWindowAnchor(evt.screenPoint));
        		map.infoWindow.resize(500, 100);
			}
	  }

      dojo.addOnLoad(init);
      
      function getRadioValue(num) {
      			var val = parseInt($('input[name=gm]:checked').val());
      			hexvalues["'"+id+"'"] = val;
      			$('#s'+id).val(val);
      			map.infoWindow.hide();
      			for (var i=0;i<hexlayer.graphics.length;i++) {
      				if (hexlayer.graphics[i].attributes.id == id) {
      					var color = "";
      					// KATE CHANGE THESE COLORS
      					switch(val) {
      						case -5:
      							color = new dojo.Color([74,0,0,0.8]);
      							break;
      						case -4:
      							color = new dojo.Color([90,0,8,0.8]);
      							break;
      						case -3:
      							color = new dojo.Color([99,8,33,0.8]);
      							break;
      						case -2:
      							color = new dojo.Color([90,0,33,0.8]);
      							break;
      						case -1:
      							color = new dojo.Color([74,0,41,0.8]);
      							break;
      						case 0:
      							color = new dojo.Color([66,0,49,0.8]);
      							break;
      						case 1:
      							color = new dojo.Color([49,0,66,0.8]);
      							break;
      						case 2:
      							color = new dojo.Color([41,0,82,0.8]);
      							break;
      						case 3:
      							color = new dojo.Color([33,0,99,0.8]);
      							break;
      						case 4:
      							color = new dojo.Color([24,0,99,0.8]);
      							break;
      						case 5:
      							color = new dojo.Color([16,0,66,0.8]);
      							break;
      					}
      					
      					var symbol = new esri.symbol.SimpleFillSymbol(esri.symbol.SimpleFillSymbol.STYLE_SOLID, new esri.symbol.SimpleLineSymbol(esri.symbol.SimpleLineSymbol.STYLE_SOLID, new dojo.Color([0,0,0]), 2), color);
      					hexlayer.graphics[i].setSymbol(symbol);
      				}	
      			}
      			
      }
      		
		function drawHex() {
			var i=0;
			var polygonSymbol = new esri.symbol.SimpleFillSymbol(esri.symbol.SimpleFillSymbol.STYLE_SOLID, new esri.symbol.SimpleLineSymbol(esri.symbol.SimpleLineSymbol.STYLE_SOLID, new dojo.Color([0,0,0,1]), 2), new dojo.Color([151, 151, 151, 0]));
	        
			while(i<hex.features.length) {
				var attributes = {'id':i};
		        var polygon = new esri.geometry.Polygon({
		          "rings": [[]],
		          "spatialReference": {"wkid": 102100}
		        });
		        for (var j=0;j<hex.features[i].geometry.coordinates[0].length;j++) {
		        	polygon.rings[[0]].push([hex.features[i].geometry.coordinates[0][j][0],hex.features[i].geometry.coordinates[0][j][1]]);
		        }
		        hexlayer.add(new esri.Graphic(polygon, polygonSymbol, attributes));
		        i++;
			}
		}