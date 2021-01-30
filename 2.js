function hitungHurufDariKalimat(str, kalimat) 
{
 var kalimat_Count = 0;
 for (var position = 0; position < str.length; position++) 
 {
    if (str.charAt(position) == kalimat) 
      {
      kalimat_Count += 1;
      }
  }
  return kalimat_Count;
}

console.log(hitungHurufDariKalimat('saya mau makan sate bersama teman saya setelah lulus dari sekolah dasar', 'a'));