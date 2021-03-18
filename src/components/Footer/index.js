import React from 'react';
import { View, Text , StyleSheet, ScrollView } from 'react-native';
import Books_Dest from '../Books_Dest';
//import { useFonts, Ruda} from '@expo-google-fonts/ruda';

export default function Footer() {
 return (
   <View >
     <Text style={styles.title}>VOCÊ TRAMBÉM PODE GOSTAR: </Text>
     <View style={{flexDirection: 'row'}}>
       <ScrollView horizontal showsHorizontalScrollIndicator={false}>
         <View style={{marginHorizontal: 10}}>
            <Books_Dest img={require('../../assets/node.jpg')} cost='110,90'>
              Node.js
            </Books_Dest>
         </View>
         <View style={{marginHorizontal: 10}}>
            <Books_Dest img={require('../../assets/php.jpg')} cost='110,90'>
              PHP.js
            </Books_Dest>
         </View>
         <View style={{marginHorizontal: 10}}>
            <Books_Dest img={require('../../assets/python.jpg')} cost='110,90'>
              PYTHON.js
            </Books_Dest>
         </View>
         <View style={{marginHorizontal: 10}}>
            <Books_Dest img={require('../../assets/node.jpg')} cost='110,90'>
              Node.js
            </Books_Dest>
         </View>
         <View style={{marginHorizontal: 10}}>
            <Books_Dest img={require('../../assets/python.jpg')} cost='110,90'>
              Node.js
            </Books_Dest>
         </View>
       </ScrollView>
     </View>
   </View>
  
   
  );
}

const styles = StyleSheet.create({
    title:{
      fontSize: 20,
     // fontFamily: 'Ruda',
      marginVertical: '2%',
      paddingHorizontal: '2%',
      marginBottom: 20,
      opacity: 0.7
    //  opacity={0.7}
    }
})