document.addEventListener("DOMContentLoaded", function () {
    const discussionData = []; // Array to store questions and comments

    document.getElementById("questionForm").addEventListener("submit", function (event) {
        event.preventDefault();
        const questionInput = document.getElementById("questionInput").value;
        const discussionItem = postQuestion(questionInput);
        discussionData.push({ question: questionInput, comments: [] });
        document.getElementById("questionForm").reset();
    });

    function postQuestion(question) {
        // Create a new discussion item for the question
        const discussionItem = document.createElement("div");
        discussionItem.classList.add("discussionItem");

        // Create a paragraph for the question
        const questionParagraph = document.createElement("p");
        questionParagraph.classList.add("question");
        questionParagraph.textContent = "Question: " + question;

        // Create a form to submit comments
        const commentForm = document.createElement("form");
        commentForm.addEventListener("submit", function (event) {
            event.preventDefault();
            const commentInput = commentForm.querySelector("input[type='text']").value;
            const comment = addComment(discussionData.length - 1, commentInput);
            commentForm.reset();
        });

        const commentInput = document.createElement("input");
        commentInput.setAttribute("type", "text");
        commentInput.setAttribute("placeholder", "Add a comment");
        commentForm.appendChild(commentInput);

        const commentButton = document.createElement("button");
        commentButton.textContent = "Submit Comment";
        commentForm.appendChild(commentButton);

        // Create a container for comments
        const commentsContainer = document.createElement("div");
        commentsContainer.classList.add("commentsContainer");

        // Append the question, comment form, and comments container to the discussion item
        discussionItem.appendChild(questionParagraph);
        discussionItem.appendChild(commentForm);
        discussionItem.appendChild(commentsContainer);

        // Append the discussion item to the discussion container
        document.getElementById("discussionContainer").appendChild(discussionItem);

        return discussionItem;
    }

    function addComment(questionIndex, comment) {
        const commentParagraph = document.createElement("p");
        commentParagraph.textContent = "Comment: " + comment;

        discussionData[questionIndex].comments.push(comment);
        document.querySelector(".commentsContainer").appendChild(commentParagraph);
    }
});
