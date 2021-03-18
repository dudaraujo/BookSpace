import React from 'react';
import { Text, View, Image, ScrollView, TouchableOpacity, StyleSheet} from 'react-native';
import Button_chat_av from '../../components/Button_chat_av';
import Footer from '../../components/Footer';

export default function Detalhes({ navigation }) {

    navigation.setOptions({
        headerTitle: 'Node.js',
    })
    return (
        <ScrollView style={styles.container}>
             <Image 
             source={require('../../assets/node.jpg')}
             style={styles.image}
             resizeMode="cover"
             />

 <View>     
        <View>
            <Text style={[styles.title, {fontSize: 30 } ]}> Node.js</Text>     
        </View>
        <View opacity={0.6}>
            <Text style={[styles.title, {fontSize: 24 } ]}> R$ 280,90</Text>     
        </View>
       
         <View style={styles.textContent}>
             <Text style={styles.textTitle}>
               Node.js
             </Text>
             <Text style={styles.textContent}>
                Construa aplicações web dinâmicas com o Express, 
             um componente-chave da stack de desenvolvimento 
             Node/JavaScript. Nesta edição atualizada, o autor
              Ethan Brown ensina os fundamentos do Express
               5 percorrendo o desenvolvimento de uma aplicação.
               Este guia prático aborda de tudo, da renderização
                no lado do servidor ao desenvolvimento de uma API 
                adequada para uso em aplicativos de página única (SPAs).
             </Text>

            
       <View style={styles.container2}>
      
             <Text style={[styles.textTitle, {alignSelf: 'center'} ]}>
                 Sobre o vendedor
                 </Text>  
                 <Button_chat_av onClick/>
      
       </View>


      <View opacity={0.7}>
             <Text style={styles.textTitle}>
                 Características
                 </Text>  
       </View>
             <Text style={styles.textList}>
                 - Idioma: 
             </Text>
             <Text style={styles.textList}>
                 - Ano: 
             </Text>
             <Text style={styles.textList}>
                 - Peso: 
             </Text>
             <Text style={styles.textList}>
                 - Altura: 
             </Text>
             <Text style={styles.textList}>
                 - Páginas: 
             </Text>
             <Text style={styles.textList}>
                 -  Edição: 
             </Text>
            
         </View>

         <View style={styles.line}/>

         <Footer/>

   

 </View>       
        </ScrollView>
    );
}

const styles = StyleSheet.create({
    container:{
        flex:1,
        width: '100%',
        backgroundColor: '#FFF'

    },
    container2:{
        width: '90%',
        height: 300,
       // justifyContent: 'center',
       // alignItems: 'center',
        borderRadius: 10,
        borderWidth: 2,
        backgroundColor: '#fff',
        marginTop: '3%',
        alignSelf: 'center',
        marginBottom: '3%'
       

    },
    image:{
        alignSelf: 'center',
        marginTop: '7%',
        marginBottom: '5%'
        //resizeMode: "contain"
        //width: '100%',
       // height: 500
    },
    title:{
        paddingHorizontal: '2%'

    },
    textContent:{
        fontSize: 16,
        lineHeight: 25,
        marginVertical: '2%',
        paddingHorizontal: '2%'
    },
    textTitle:{
        fontSize: 22,
        marginVertical: '2%'
    },
    textList:{
        fontSize: 16,
        lineHeight: 25
    },
    line:{
        borderWidth: 1,
        borderBottomColor: '#DDD',
        marginVertical: '2%'

    }
});