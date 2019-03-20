"use strict";var center=[config.centerlat,config.centerlng],zoom=config.zoom,all_markers="string"==typeof config.marker?JSON.parse(config.marker):[],all_lines="string"==typeof config.polyline?JSON.parse(config.polyline):[],map=L.map("map").setView(center,zoom);L.tileLayer("https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png",{maxZoom:19,attribution:'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'}).addTo(map);var EventMarker=L.Icon.extend({options:{shadowUrl:null,iconAnchor:new L.Point(12,12),iconSize:new L.Point(24,24),iconUrl:"https://storage.googleapis.com/planet4-netherlands-stateless/2018/05/913c0158-cropped-5b45d6f2-p4_favicon-150x150.png"}}),ShipMarker=L.Icon.extend({options:{shadowUrl:null,iconAnchor:new L.Point(12,12),iconSize:new L.Point(24,24),iconUrl:"https://storage.googleapis.com/planet4-netherlands-stateless/2019/03/3decbd94-sailboat-zwart.png"}});$.each(all_lines,function(e,a){var t=L.polyline(a,{color:"#66CC00",weight:5,opacity:1}).addTo(map);delete all_lines[e],all_lines[L.stamp(t)]=a}),$.each(all_markers,function(e,a){if(0===e){var t=L.marker(a,{icon:new EventMarker}).addTo(map);delete all_markers[e],all_markers[L.stamp(t)]=a,t.bindPopup('<a href="https://www.greenpeace.org/nl/acties/plasticmonster/plastival/">Doe mee met de Plastic Monster Rave!</a>',{className:"popupCustom"}).openPopup()}if(1===e){t=L.marker(a,{icon:new EventMarker}).addTo(map);delete all_markers[e],all_markers[L.stamp(t)]=a,t.bindPopup('<a href="https://www.greenpeace.org/nl/acties/plasticmonster/rave/">Kom ook naar het Plastival!</a>',{className:"popupCustom"})}if(2===e){t=L.marker(a,{icon:new ShipMarker}).addTo(map);delete all_markers[e],all_markers[L.stamp(t)]=a,t.bindPopup("Hier is de Beluga nu!",{className:"popupCustom"})}});
//# sourceMappingURL=maps/gpnl-map.js.map
