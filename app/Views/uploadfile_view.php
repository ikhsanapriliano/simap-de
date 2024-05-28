<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Group 1</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A700%2C900"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C700%2C900"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans%3A400"/>
  <link rel="stylesheet" href="http://localhost/CI/public/aset/css/group-1-UF.css">
  

<style>
  a {
    text-decoration: none;
    border: none;
    padding:0.5rem;
    display: inline-block;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    }
  a:hover {
    background-color: rgba(169, 169, 169, 0.8); 
    transform: scale(1.05);  
}
</style>
</head>
<body>
<div class="group-1-AQF">
  <div class="desktop-1-v8X">
    <div class="auto-group-mhmz-Tu9">
      <a href="dashboard">
      <p class="simap-de-y6o">SIMAP-DE</p>
      </a>
      <img class="list-fVR" src="/aset/img/list-C3Z.png"/>
      	<div class="auto-group-yc39-PRR">
        <img class="image-2-KK5" src="/aset/img/image-2-GCf.png"/>
      	</div>
    </div>
    
                                
      <p class="upload-file-dqZ">Upload File </p>
        <div class="auto-group-1tak-kQP">
          <div class="auto-group-ovzd-4vs">
            <div class="auto-group-4fbu-Qjq">
            <p class="file-pdf-Yr3">File PDF</p>
            <img class="design-photo-GGF" src="/aset/img/design-photo-6Mu.png"/>
            <form method="post" action="{{route('ufupload')}}"/>
              <div>
                <input type="file" name="filepdf" accept=".pdf" />
              </div>
        
            </div>
              <div class="auto-group-tqdu-zCF">
                <p class="file-cadzip-9aw">File CAD.zip</p>
                <img class="design-photo-6FH" src="/aset/img/design-photo-QFZ.png"/>
                  <div>
                    <input type="file" name="filezip" accept=".zip" />
                  </div>
               </div>
             </div>
         <p class="no-registrasi-2ud">No. Registrasi</p>
      <div class="auto-group-avwf-9zF">
        <div class="text-inputs-HKm">
          <div class="auto-group-u1dh-EF1">
            <div class="input-field-P7u">
              <div class="text-jhZ">
                <img class="icon-2wZ" src="/aset/img/icon-k8X.png"/>
                <form method="post" action="{{route('ufupload')}}"/>
                <div>
                  <input type="text" name="noregistrasi"  class="type-here-u6F" placeholder="Type here"/>
                </div>
                </div>
            </div>
          </div>
          <div class="auto-group-gjvp-k6s">Pemesan</div>
        </div>
        <div class="text-inputs-599">
          <div class="auto-group-gcup-bNP">
            <div class="input-field-jzP">
              <div class="text-J1u">
                <img class="icon-BbV" src="/aset/img/icon-qkT.png"/>
                <form method="post" action="{{route('ufupload')}}"/>
                <div>
                  <input type="text" name="pemesan"  class="type-here-TQb" placeholder="Type here"/>
                </div>
              </div>
            </div>
          </div>
          <div class="auto-group-umb5-hpj">Nama Pekerjaan </div>
        </div>
        <div class="text-inputs-peT">
          <div class="auto-group-hduh-ATR">
            <div class="input-field-7dZ">
              <div class="text-HH9">
                <img class="icon-bYj" src="/aset/img/icon-vw9.png"/>
                <form method="post" action="{{route('ufupload')}}"/>
                <div>
                  <input type="text" name="namapekerjaan"  class="type-here-FUs" placeholder="Type here"/>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="buttons-Wvb">Submit</div>
    </div>
  </div>
</div>
</body>
