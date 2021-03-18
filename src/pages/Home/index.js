import React from 'react';
import { View, Text, StyleSheet, ScrollView, Image, TouchableOpacity } from 'react-native';
import {MaterialIcons} from '@expo/vector-icons';
import { useNavigation } from '@react-navigation/native';
import { Entypo } from '@expo/vector-icons';
import { EvilIcons } from '@expo/vector-icons';


import Dados_us from '../Dados_us';
import Books_Dest from '../../components/Books_Dest';

export default function Home() {
const navigation = useNavigation();

 return (
  <View style={styles.container}>
     <View style={styles.header}>
       

       
       <View style={styles.textContainer}>
         <TouchableOpacity style={{  marginTop: 30 }}>
             <Entypo name="menu" size={35} color="white" />
         </TouchableOpacity>
          <Text style={[styles.title, {color: '#FFF'}]}>BookSpace</Text>
          <TouchableOpacity style={{  marginTop: 35, paddingHorizontal: '30%'}}>
          <EvilIcons name="search" size={35} color="white" />
         </TouchableOpacity>
       </View>
     
       
       <View style={styles.textContainer}>

         
      
       <TouchableOpacity>
         <Text style={[styles.text, {color: '#FFF'}]}>Categorias</Text>
         </TouchableOpacity>
         <TouchableOpacity>
         <Text style={[styles.text,  { color: '#FFF'} ]}>Anunciar</Text>
         </TouchableOpacity>
         <TouchableOpacity  onClick={()=> navigation.navigate('Dados_us') }>
         <Text style={[styles.text,  { color: '#FFF'} ]}>Minha Conta</Text>
         </TouchableOpacity>
       </View>
     </View>

<View style={styles.line} />

<ScrollView>

<Text style={[styles.text,  { color: '#000', fontSize: 25, marginBottom: 10, opacity: 0.7 } ]}>DESTAQUES: </Text>

  <View style={{ flexDirection: 'row', justifyContent: 'space-around'}}>
 <Books_Dest img={require('../../assets/node.jpg')} cost="R$90,00" onClick={()=> navigation.navigate('Detalhes') }>
  Node.js 
 </Books_Dest>
 <Books_Dest img={require('../../assets/python.jpg')} cost="R$100,00" onClick={()=> navigation.navigate('Detalhes') }>
   Python 
 </Books_Dest> 
  </View>
  <View style={{ flexDirection: 'row', justifyContent: 'space-around'}}>
  <Books_Dest img={require('../../assets/node.jpg')} cost="R$90,00" onClick={()=> navigation.navigate('Detalhes') }>
 Node.js 
 </Books_Dest>
 <Books_Dest img={require('../../assets/python.jpg')} cost="R$100,00" onClick={()=> navigation.navigate('Detalhes') }>
   Python 
 </Books_Dest> 
  </View>
  <View style={{ flexDirection: 'row', justifyContent: 'space-around'}}>
 <Books_Dest img={require('../../assets/node.jpg')} cost="R$90,00" onClick={()=> navigation.navigate('Detalhes') }>
 Node.js 
 </Books_Dest>
 <Books_Dest img={require('../../assets/python.jpg')} cost="R$100,00" onClick={()=> navigation.navigate('Detalhes') }>
   Python
 </Books_Dest> 
  </View>

</ScrollView>

   </View>
  );
}

const styles = StyleSheet.create({
  container:{
    flex:1,
    width:'100%',
    backgroundColor: '#fff'
  },
  header:{
    marginBottom: 25,
    backgroundColor: '#17a2b8'
  },
  textContainer:{
    flexDirection: 'row',
    marginVertical: '2%',
    marginHorizontal: '3%',
    marginTop: 15,
    
  },
  text:{
    fontSize: 17.5,
    marginHorizontal: '5%'

  }, 
  title:{
   fontSize: 27,
  marginLeft: '5%',
   marginTop: '8%'
  }
});