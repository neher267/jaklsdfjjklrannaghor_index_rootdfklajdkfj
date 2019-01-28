Branch:
id 	name 	 address_id


department:
id 	branch_id(nullable) 	name 		slug
1 				Grocery 	grocery
2 				Assets 	assets

categories:
id 	branch_id	department_id		name 
1			1			egg
2			1			rice
3			1			oil 	
4 			1			gur
5			2			tools

product:
id 	category_id		name 	 		unit	sale(boolean) 	branch_id(nullable)
1 	1				layer-egg		pcs
2	1				deshi-dim-murgi	pcs
3 	1				egg-hash		pcs
4 	2 				balam-chal		KG
5 	2  				kalijira-chal		KG
6 	5				basket			pcs 		

images:
id 	imageable_id 	imageable_type 	type 		status  	src
1 	1				category 		slide 			1
2 	1 				product 		profile 		1
2 	1 				branch 			profile 		1

mix_packages:
id 	name			branch_id
1 	chal+egg+tel-one	
1 	chal+egg+tel-two	
1 	chal+egg+tel+gur	

packages:
id 	packageable_id 	packgeable_type 	title 				description
1	1			mix 			For you mom!			5 kg chal. 10 pcs dim. 2L oil.
2	1			mix 			For you mom!			10 kg chal. 10 pcs dim. 2L oil.
3	1			product 		Bachelor Jindabat!		25pcs layer egges.


prices:
id 	priceable_id 		priceable_type 	price(unit)
1 	1			product 		7
2 	3			package 		170 		


stock: 
id	branch_id 	product_id  	deposit 	withdraw  	balance
1	1		1		500		100		380	
2	1		5		100		 0		500

tret(nosto howa):
id	branch_id	product_id 	reason  	quantity 
1	1		1		broken		20


gifts:
id 	name		points
1 	pen			2
2 	box			4
3 	ball		4

users:
id 	branch_id 	mobile 		name 		points
1 	1		01784255196 	Neher 		10

addresses:
id   addressable_id      addressable_type 	area_id      block      road_no      house_no        house_name   	floor

orders:
id 	user_id 	discount 	

order_details:
id  	order_id 	orderable_id 		orderable_type 	 qty 	price 	

roles:
chairman
admin
managar
hr
buyer
customer
merchant
salesman
deliveryboy


price:
product 	qty 	total_price 	unit_price 		p_date
dim 		100		500				5				1 april
chal 		10		500				50				1 april
tel 		10 		500				50 				1 April
khoros 				300					
					1800			105


# Manager Create a purchases. This time status is 0
# Add required products
# Send Notification to Buyer
# Buyer buy all products
# Buyer Add All Expences
# Send Notification to Manger
# After Sending Notification Buyer cann't edit purchese history. Only see.
# Manager Check Purchase Products and Update stock
# Manger Update staus 0 to 1
# After Updating Manager cant not edit

# debit = Total amount of tk given by manage
# credit = purchese products price + other expence
# status = 0, before update stock. 1, after update stock
# merchent_id = nullable. Manager can also assign a merchant.
# product_id, quantity column fill by Manage
# price, deposit, tret = nullable
# required_quantity = null, when create a new purchases recore by buyer

CompanyAccount:

id 		user_id 	debit 	credit 	balance
1		6			6000	4570	430

purcheses:
id 	purcheseID  buyer_id	manager_id	debit  credit	fine 	 approve_by
1   2312451		6			8			5000   4000		100		 1


purchase_details:
id 	purchese_id		merchant_id  	product_id 	required_quantity 	purchase_qty 	price 	deposit  tret  update_stock
1	1				4				6			500					450				2250	500		 0		1	
1	1				7				6			null				50				50		500		 0		1			
							
expences:
id 	user_id 	title 		amount 	 fine 	short_description  date 			approve_by
1 	6			transport	500		 0		Van vara		   May 15, 2018 	1 (approved)
2 	6			laborer 	120 	 0		kuli			   May 15, 2018 	1
3 	6			tea 		50		 0		5 persons		   May 15, 2018 	1


# manager purchase assign korbe
# buyer purchase korbe
# manager er kache purchase repprt korbe
# manager stock update korbe


transactions:
id transactionable_id	transactionable_type 	transaction_type(debit||credit) 	amount	date 	created_at 	updated_at 

							