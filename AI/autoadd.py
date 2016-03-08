i = 'true'
while (i == 'true'):
	InputKeyword = raw_input('Enter Keyword: ')
	Keyword = ("K" + InputKeyword + "\n").upper()
	print(Keyword)
	if Keyword in open('script.txt').read():
	    print "Keyword Found! Try Again."
	else:
		InputResponse = raw_input('Enter Response: ')
		Response = ("R" + InputResponse + "\n").upper()
		print(Response)
		with open("script.txt", "a") as myfile:
			myfile.write(Keyword)		
			myfile.write(Response)
			myfile.write("#\n")
			print("Success!")