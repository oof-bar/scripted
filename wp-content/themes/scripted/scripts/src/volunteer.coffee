$("#volunteer").validate
  debug: true
  errorElement: "em"
  #groups:
    # username: "name-first name-last"
  rules:
    "name-first": "required"
    "name-last": "required"
    email:
      required: true
      email: true
  messages:
    "name-first": "We have to have your first name."
    "name-last": "Last name, too!"
    email:
      required: "We'll need to get in touch with you, so a valid email is required.",
      email: "An email address must be in the format of name@domain.com"