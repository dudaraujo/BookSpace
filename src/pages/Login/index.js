import React, {useState, useEffect} from 'react';
import {                    
View,
Text,
KeyboardAvoidingView, //KeyboardAvoidingView é para o teclado não ficar em cima dos items
TouchableOpacity,
TextInput,
Image,
StyleSheet,
Animated,
Keyboard
} from 'react-native';

export default function Login () {

  const [offset] = useState(new Animated.ValueXY({x: 0, y:95})) //animação de subir
  const [opacity] = useState(new Animated.Value(0)); //animação para começar com opacidade
  const [logo] = useState(new Animated.ValueXY({x: 230, y: 100 })) // altura e largura da logo mudar

  useEffect(()=> {
      keyboardDidShowListener = Keyboard.addListener('keyboardDidShow', keyboardDidShow); //função executada quando o teclado estiver aberto
      keyboardDidHideListener = Keyboard.addListener('keyboardDidHide', keyboardDidHide); //função executada quando o teclado estiver fechado
      
    //parallel é duas animações ocorrerem simultaneamnete 
      Animated.parallel([
        Animated.spring(offset.y, {
            toValue: 0,  //começa em 95 e vai pra 0
            speed: 4,
            bounciness: 20 //chacoalhar 
        }),
        Animated.timing(opacity, {
            toValue: 1, //começa de 0 e vai pra 1
            duration: 200,
        })
      ]).start();
  
  }, []);

  function keyboardDidShow(){
      Animated.parallel([
          Animated.timing(logo.x, {
              toValue: 120,
              duration: 100,
          }),
          Animated.timing(logo.y, {
            toValue: 55,
            duration: 100,
        }),
      ]).start();
  }

  function keyboardDidHide(){
    Animated.parallel([
        Animated.timing(logo.x, {
            toValue: 230,
            duration: 100,
        }),
        Animated.timing(logo.y, {
          toValue: 100,
          duration: 100,
      }),
    ]).start();
  }

    return (  
       <KeyboardAvoidingView style={styles.background}> 
        <View style={styles.containerLogo}> 
           <Animated.Image
           style={{
               width: logo.x,
               height: logo.y,
           }}
           source={require('../../assets/logo.png')}
           />
        </View>

        <Animated.View 
          style={[
              styles.container,
              {
                opacity: opacity,
                transform: [
                    {translateY: offset.y }
                ]
              }
              ]}
         >

            <TextInput
             style={styles.input}
                placeholder="Email"
                autoCorrect={false}
                onChangeText={()=> {}}
            />
            <TextInput
             style={styles.input}
                placeholder="Senha"
                autoCorrect={false}
                onChangeText={()=> {}}
            />

            <TouchableOpacity style={styles.btnSubmit}>
                <Text syle={styles.submitText}>Acessar</Text>
            </TouchableOpacity>

            <TouchableOpacity style={styles.btnRegister}>
                <Text style={styles.registerText}>Criar conta</Text>
            </TouchableOpacity>
        </Animated.View>
       </KeyboardAvoidingView>
    );
}
const styles = StyleSheet.create({
    background:{
        flex: 1,
        alignItems: 'center',
        justifyContent: 'center',
        backgroundColor: '#191919'
    },
    containerLogo:{
        flex: 1,
        justifyContent: 'center',
        paddingTop: 60
    },
    container:{
        flex: 1,
        alignItems: 'center',
        justifyContent: 'center',
        width: '90%',
        paddingBottom: 50
    },
    input:{
        backgroundColor: '#fff',
        width: '90%',
        marginBottom: 15,
        color: '#222',
        fontSize: 17,
        borderRadius: 7,
        padding: 10
    },
    btnSubmit:{
        backgroundColor: '#17a2b8',
        width: '90%',
        height: 45,
        alignItems: 'center',
        justifyContent: 'center',
        borderRadius: 7 
    },
    submitText:{
        color: '#fff',
        fontSize: 18
    },
    btnRegister:{
        marginTop: 10
    },
    registerText:{
        color: '#fff'
    }
});