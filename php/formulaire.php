<script>
  const textarea = document.getElementById('message');
  textarea.addEventListener('input', function () {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
  });
</script>

<form method="POST" action="traitement.php">
<link rel="stylesheet" href="/css/formulaire.css">
   <label>Ton nom :</label>
   <input name="nom" id="nom" type="text" />
   <label>Ton prenom :</label>
   <input name="prenom" id="prenom" type="text" />
   <label>Ton âge :</label>
   <input name="age" id="age" type="number" /></p>

   <label>Ton adresse :</label>
   <input name="adresse" id="adresse" type="text" />

   <label>Ton message pour le père noël :</label>
   <textarea name="message" id="message" rows="3" style="resize: none;"></textarea>


   <button type="submit">Valider</button>
   
</form>

