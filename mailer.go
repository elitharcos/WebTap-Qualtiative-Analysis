package main

import (
	"net/smtp"
	"os"
)

func main() {
	args := os.Args[1:]
	send(args[0], args[1])
}

func send(to string, body string) {
	from := "email"
	pass := "password"

	msg := "From: " + from + "\n" +
		"To: " + to + "\n" +
		"Subject: verification\n\n" +
		body

	smtp.SendMail("smtp.gmail.com:587",
		smtp.PlainAuth("", from, pass, "smtp.gmail.com"),
		from, []string{to}, []byte(msg))
}
