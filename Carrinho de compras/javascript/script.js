// Criação do array, utilizado para armazenar os produtos
let carrinho =[]
function adicionarCarrinho(n){
// Verificação de qual produto foi adicionado ao carrinho
	switch (n) {

		case 1: {
			carrinho.push({ 
				nomeProduto: "Produto 1",
			 	preco: 199.00
			 })
		break
		}
		case 2: {
			carrinho.push({
			nomeProduto: "Produto 2",
			preco: 299.00
			})
		break
		}
		case 3: {
			carrinho.push({
			nomeProduto: "Produto 3",
			preco: 399.00
			})
		break
		}
		case 4: {
			carrinho.push({
			nomeProduto: "Produto 4",
			preco: 499.00
			})
		break
		}
		case 5: {
			carrinho.push({
			nomeProduto: "Produto 5",
			preco: 599.00
			})
		break
		}
		case 6: {
			carrinho.push({
			nomeProduto: "Produto 6",
			preco: 699.00
			})
		break
		}
		case 7: {
			carrinho.push({
			nomeProduto: "Produto 7",
			preco: 799.00
			})
		break
		}
		case 8: {
			carrinho.push({
			nomeProduto: "Produto 8",
			preco: 899.00
			})
		break
		}
		case 9: {
			carrinho.push({
			nomeProduto: "Produto 9",
			preco: 999.00
			})
		break
		}
		case 10: {
			carrinho.push({
			nomeProduto: "Produto 10",
			preco: 1000.00
			})
		break
		}
		case 11:{
			carrinho.push({
			nomeProduto: "Produto 11",
			preco: 1100.00
			})
		break
		}
		case 12:{
			carrinho.push({
			nomeProduto: "Produto 12",
			preco: 1200.00
			})
		break
		}
		case 13:{
			carrinho.push({
				nomeProduto:"Produto 13",
				preco:1300.00
			})
		break
		}
		case 14:{
			carrinho.push({
				nomeProduto: "Produto 14",
				preco:1400.00
			})
		break
		}
		case 15:{
			carrinho.push({
				nomeProduto: "Produto 15",
				preco:1500.00
			})
		break
		}
		case 16:{
			carrinho.push({
				nomeProduto: "Produto 16",
				preco:1500.00
			})
		break
		}
		case 17:{
			carrinho.push({
				nomeProduto:"Produto 17",
				preco:1700.00
			})
		break
		}
		case 18:{
			carrinho.push({
				nomeProduto:"Produto 18",
				preco:1800.00
			})
		}
		default: {
			alert("Produto não encontrado")
			return
		}
	}
	alert(`Produto adicionado: ${carrinho[carrinho.length - 1].nomeProduto} - Preço: R$${carrinho[carrinho.length - 1].preco.toFixed(2)}`);
}
	



