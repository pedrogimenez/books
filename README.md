# Books

This is just an application I'm writing for fun using PHP + Symfony. I used to write software in PHP but I've been using Ruby for the last seven years and
I wanted to get in touch with the language again.

I know that this architecture may appear overkill for such a project but I wanted to play with some concepts.

I know there are a lot of things to improve. Off the top of my head we could refactor these three things:
- I don't like the tight coupling between Doctrine and Symfony in the Repository test cases
- I could pass a DTO Assembler to the Application Service and pass the responsibility of building custom DTOs to the client
- I should create a decorator implementing transactions for the Application Service and remove the `flush()` call from the Repository