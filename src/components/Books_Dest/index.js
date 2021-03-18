import React from 'react';
import { View, Text, TouchableOpacity, Image, StyleSheet } from 'react-native';

export default function Books_Dest(props) {

    function filterDesc(desc){
        if(desc.length < 27){
            return desc;
        }

        return '${desc.substring(0, 23)}...';
    }

 return (
     
   <TouchableOpacity style={styles.container} onPress={props.onClick}>
       
       <Image
        source={props.img}
        style={styles.booksImg}
       />
     
         <Text style={styles.booksText}>
          {filterDesc(props.children)}    
        </Text>
    
       <View opacity={0.4}>
          <Text style={styles.booksText}> {props.cost} </Text>
       </View>
   </TouchableOpacity>
  
     
  );
}

const styles = StyleSheet.create({
    container:{
        paddingVertical: '2%',
        alignItems: 'center',
       justifyContent: 'center',
    },
    booksText:{
        fontSize: 16
    },
    booksImg:{
        width: 120,
        height: 170
    }

});