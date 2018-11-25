# ansh-system-php-test
This repository is for ansh system php test with all 1-8 Tasks

1. Task	1
We	need	to	make	a	command	line	utility	to	sum	zero	to	two	numbers.	Command	
should	be:
php	calculator.php	sum
php	calculator.php sum	1
php	calculator.php	sum	2,3
Expected	outputs	of	above	commands	are	0,	1,	and	5	respectively.

Task	2
In	task	1,	we	were	handling	0,	1	or	2	parameters.	Now	we	need	to	add	capability	
of	handling	multiple	numbers	so	that	all	following	commands	work	correctly.
php	calculator.php	add
php	calculator.php	add	1
php	calculator.php	add	2,3
php	calculator.php	add	4,5,6
php	calculator.php	add	2,3,4,5
php	calculator.php	add	4,7,3,4,7,3,5,6,7,4,3,2,5,7,5,3,4,6,7,8,9,5,5,5,4,3,2
Obviously,	its	output	should	be:
0
1
5
15
14
133
In	short,	it	should	be	able	to	take	multiple	numbers	and	should	add	them.

Task	3
Allow	add	method	to	use	new	line	character	\n as	number	separator.	Example
php	calculator.php	add	2\n3,4
is	valid	and	will	return	9.

Task	4
Support	different	delimiters
Add	method	should	allow	defining what	delimiter	is	used	to	separate	numbers.	
Format	\\[delimiter]\\numbers. To make	it	easy,	\ will	never	be	a	part	of	
delimiter.
Thus,	following	command	is	possible.
php	calculator.php	add \\;\\3;4;5
and	its	output	will	be	12

Task	5
Negative	numbers	should	show	error.
If	we	try
php	calculator.php	add	\\,\\2,7,-3,5,-2,	
we	must	get	following	error output:
Error:	Negative	numbers	not	allowed.

Task	6
Also	show	the	negative	numbers	in	error	message.	For	example,	output	of	
php	calculator.php	add	\\,\\2,7,-3,5,-2
should	be:
Error:	Negative	numbers	(-3,-2)	not	allowed.

Task	7
Ignore	numbers	above	1000.	For	example,	command	
php	calculator.php	add 10,20,1010,20
should	return	50.

Task	8
Making	multiply	functionality.	Commands	like
php	calculator.php	multiply	2,3
should	work	and	return	6.	Please	ensure	you	follow	all	the	rules	we	make	for	add	
functionality	in	task	1-7.
