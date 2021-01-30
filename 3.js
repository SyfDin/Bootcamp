var bil=prompt('masukan nilai n :');
bil=parseInt(bil);


//bentuk kri atas
for(i = 0; i < bil / 2; i++){
  for(j = 0; j < bil / 2 - i; j++){
    document.write('&nbsp&nbsp&nbsp');
  }


for(j = 0; j < 2 * i + 2; j++){
  if (i == 0 || j == 0 || j == 2 * i + 1)
document.write('*');
 else 
 document.write('&nbsp&nbsp&nbsp');
}
document.write('<br>');
}

for(i = bil / 2 - 1; i >= 0; i--){
  for (j = 0; j < bil / 2 - i; j++) {
    document.write('&nbsp&nbsp&nbsp');
} 
for (j = 0; j < 2 * i + 2; j++){
if (i == bil / 2 || j == 0 || j == 2 * i + 1)
document.write('*');
else document.write('&nbsp&nbsp&nbsp');

}
document.write('<br>');

}