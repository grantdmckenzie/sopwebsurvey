	  dojo.require("esri.map");
      dojo.require("esri.toolbars.draw");
      dojo.require("dijit.dijit"); // optimize: load dijit layer
      dojo.require("dijit.layout.BorderContainer");
      dojo.require("dijit.layout.ContentPane");
      
      var map, toolbar, symbol;
      var geoms = [];
      var count = 0;
      var hexlayer;

      function init() {
        var initExtent = new esri.geometry.Extent({"xmin":-119.925,"ymin":34.3777,"xmax":-119.626,"ymax":34.4669,"spatialReference":{"wkid":4326}});
        map = new esri.Map("map",{
          extent:esri.geometry.geographicToWebMercator(initExtent)
        });
        
        dojo.connect(map, "onLoad", createToolbar);
        dojo.connect(map, 'onLoad', function(theMap) { 
          //resize the map when the browser resizes
            dojo.connect(dijit.byId('map'), 'resize', map,map.resize);
            map.disableScrollWheelZoom();
			map.disableDoubleClickZoom();
			map.disableKeyboardNavigation();
			map.showPanArrows();
			map.hideZoomSlider();
			toolbar.activate(esri.toolbars.Draw.POLYGON);
        });
        
        //Add the topographic layer to the map. View the ArcGIS Online site for services http://arcgisonline/home/search.html?t=content&f=typekeywords:service    
        var basemap = new esri.layers.ArcGISTiledMapServiceLayer("http://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer");
        map.addLayer(basemap);
        
        hexlayer = new esri.layers.GraphicsLayer();
        map.addLayer(hexlayer);
        
        $('#map').bind("contextmenu",function(e){
              return false;
        });
        // drawHex();
        
      }

      dojo.addOnLoad(init);
      
      function createToolbar(themap) {
       toolbar = new esri.toolbars.Draw(map);
       esri.bundle.toolbars.draw.start = "Click to start drawing.  Right click on polygon to delete";
       dojo.connect(toolbar, "onDrawEnd", addToMap);
       dojo.connect(map.graphics, "onMouseOver", function(evt) {
			dojo.connect(map.graphics, "onMouseDown", function(evt) {
				if (evt.button == 2) {
					selected = evt.graphic;	
					map.graphics.remove(selected);
					for (var i=0;i<geoms.length;i++) {
						if (geoms[i].grantid == selected.grantid) {
							geoms.splice(i,1);	
							$('#geom').val(JSON.stringify(geomToString()));
						}
					}
				}
			});
        });
      }

      function addToMap(geometry) {
        	// toolbar.deactivate();
			var symbol = new esri.symbol.SimpleFillSymbol(esri.symbol.SimpleFillSymbol.STYLE_SOLID, new esri.symbol.SimpleLineSymbol(esri.symbol.SimpleLineSymbol.STYLE_DASHDOT, new dojo.Color([255,0,0]), 2), new dojo.Color([255,255,0,0.25]));
			var graphic = new esri.Graphic(geometry, symbol);
			graphic.grantid = count;
			count++;
			map.graphics.add(graphic);
			geoms.push(graphic);
			$('#geom').val(JSON.stringify(geomToString()));
      }
      
      
      function geomToString() {
			var featureSet = {};
			featureSet.features = [];
			
			for(var i=0;i<geoms.length;i++) {
				featureSet.features[i] = {};
				featureSet.features[i].geometry = {};
				featureSet.features[i].geometry.rings = geoms[i].geometry.rings;
			}
			var x = JSON.stringify(featureSet);
			return x;
		}
		
		function drawHex() {
			var i=0;
			var polygonSymbol = new esri.symbol.SimpleFillSymbol(esri.symbol.SimpleFillSymbol.STYLE_SOLID, new esri.symbol.SimpleLineSymbol(esri.symbol.SimpleLineSymbol.STYLE_SOLID, new dojo.Color([0,0,0,1]), 2), new dojo.Color([151, 249, 0, 0]));
	        
			while(i<hex.features.length) {
				
		        var polygon = new esri.geometry.Polygon({
		          "rings": [[]],
		          "spatialReference": {"wkid": 102100}
		        });
		        for (var j=0;j<hex.features[i].geometry.coordinates[0].length;j++) {
		        	polygon.rings[[0]].push([hex.features[i].geometry.coordinates[0][j][0],hex.features[i].geometry.coordinates[0][j][1]]);
		        }
		        hexlayer.add(new esri.Graphic(polygon, polygonSymbol));
		        i++;
			}
		}