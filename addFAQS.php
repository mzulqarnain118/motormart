<!DOCTYPE html>
<html>
<head>
  <style>
    .faq-form {
      margin-bottom: 10px;
    }
    .remove-btn {
      margin-left: 10px;
      cursor: pointer;
      color: red;
    }
  </style>
</head>
<body>
  <form action="process.php" method="POST">
    <div id="faq-container">
      <div class="faq-form">
        <input type="text" name="questions[]" placeholder="Enter question" required>
        <input type="text" name="answers[]" placeholder="Enter answer" required>
        <span class="remove-btn" onclick="removeFAQ(this)">-</span>
      </div>
    </div>
    <button type="button" onclick="addFAQ()">+</button>
    <button type="submit">Submit</button>
  </form>

  <script>
    function addFAQ() {
      const faqContainer = document.getElementById("faq-container");

      const faqForm = document.createElement("div");
      faqForm.classList.add("faq-form");

      const questionInput = document.createElement("input");
      questionInput.type = "text";
      questionInput.name = "questions[]";
      questionInput.placeholder = "Enter question";
      questionInput.required = true;

      const answerInput = document.createElement("input");
      answerInput.type = "text";
      answerInput.name = "answers[]";
      answerInput.placeholder = "Enter answer";
      answerInput.required = true;

      const removeBtn = document.createElement("span");
      removeBtn.classList.add("remove-btn");
      removeBtn.innerText = "-";
      removeBtn.onclick = function() {
        removeFAQ(this);
      };

      faqForm.appendChild(questionInput);
      faqForm.appendChild(answerInput);
      faqForm.appendChild(removeBtn);

      faqContainer.appendChild(faqForm);
    }

    function removeFAQ(btn) {
      const faqForm = btn.parentNode;
      const faqContainer = faqForm.parentNode;
      faqContainer.removeChild(faqForm);
    }
  </script>
</body>
</html>
