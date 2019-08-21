import { StyleSheet } from 'react-native';

export default StyleSheet.create({
  body: {
    fontFamily: ''Lato''
  },
  h1: {
    fontWeight: '700',
    fontFamily: ''Montserrat''
  },
  h2: {
    fontWeight: '700',
    fontFamily: ''Montserrat''
  },
  h3: {
    fontWeight: '700',
    fontFamily: ''Montserrat''
  },
  h4: {
    fontWeight: '700',
    fontFamily: ''Montserrat''
  },
  h5: {
    fontWeight: '700',
    fontFamily: ''Montserrat''
  },
  h6: {
    fontWeight: '700',
    fontFamily: ''Montserrat''
  },
  'hrstar-light': {
    maxWidth: [{ unit: 'rem', value: 15 }],
    padding: [{ unit: 'px', value: 0 }, { unit: 'px', value: 0 }, { unit: 'px', value: 0 }, { unit: 'px', value: 0 }],
    textAlign: 'center',
    border: [{ unit: 'string', value: 'none' }],
    borderTop: [{ unit: 'string', value: 'solid' }, { unit: 'rem', value: 0.25 }],
    marginTop: [{ unit: 'rem', value: 2.5 }],
    marginBottom: [{ unit: 'rem', value: 2.5 }],
    marginLeft: [{ unit: 'string', value: 'auto' }],
    marginRight: [{ unit: 'string', value: 'auto' }]
  },
  'hrstar-dark': {
    maxWidth: [{ unit: 'rem', value: 15 }],
    padding: [{ unit: 'px', value: 0 }, { unit: 'px', value: 0 }, { unit: 'px', value: 0 }, { unit: 'px', value: 0 }],
    textAlign: 'center',
    border: [{ unit: 'string', value: 'none' }],
    borderTop: [{ unit: 'string', value: 'solid' }, { unit: 'rem', value: 0.25 }],
    marginTop: [{ unit: 'rem', value: 2.5 }],
    marginBottom: [{ unit: 'rem', value: 2.5 }],
    marginLeft: [{ unit: 'string', value: 'auto' }],
    marginRight: [{ unit: 'string', value: 'auto' }]
  },
  'hrstar-light:after': {
    position: 'relative',
    top: [{ unit: 'em', value: -0.8 }],
    display: 'inline-block',
    padding: [{ unit: 'px', value: 0 }, { unit: 'em', value: 0.25 }, { unit: 'px', value: 0 }, { unit: 'em', value: 0.25 }],
    content: ''\f005'',
    fontFamily: 'FontAwesome',
    fontSize: [{ unit: 'em', value: 2 }]
  },
  'hrstar-dark:after': {
    position: 'relative',
    top: [{ unit: 'em', value: -0.8 }],
    display: 'inline-block',
    padding: [{ unit: 'px', value: 0 }, { unit: 'em', value: 0.25 }, { unit: 'px', value: 0 }, { unit: 'em', value: 0.25 }],
    content: ''\f005'',
    fontFamily: 'FontAwesome',
    fontSize: [{ unit: 'em', value: 2 }]
  },
  'hrstar-light': {
    borderColor: '#fff'
  },
  'hrstar-light:after': {
    color: '#fff',
    backgroundColor: '#00aaFF'
  },
  'hrstar-dark': {
    borderColor: '#003961'
  },
  'hrstar-dark:after': {
    color: '#003961',
    backgroundColor: 'white'
  },
  section: {
    padding: [{ unit: 'rem', value: 6 }, { unit: 'px', value: 0 }, { unit: 'rem', value: 6 }, { unit: 'px', value: 0 }]
  },
  'section h2': {
    fontSize: [{ unit: 'rem', value: 2.25 }],
    lineHeight: [{ unit: 'rem', value: 2 }],
    '>w992': {
      fontSize: [{ unit: 'rem', value: 3 }],
      lineHeight: [{ unit: 'rem', value: 2.5 }]
    }
  },
  'btn-xl': {
    padding: [{ unit: 'rem', value: 1 }, { unit: 'rem', value: 1.75 }, { unit: 'rem', value: 1 }, { unit: 'rem', value: 1.75 }],
    fontSize: [{ unit: 'rem', value: 1.25 }]
  },
  'btn-social': {
    width: [{ unit: 'rem', value: 3.25 }],
    height: [{ unit: 'rem', value: 3.25 }],
    fontSize: [{ unit: 'rem', value: 1.25 }],
    lineHeight: [{ unit: 'rem', value: 2 }]
  },
  'scroll-to-top': {
    zIndex: '1042',
    right: [{ unit: 'rem', value: 1 }],
    bottom: [{ unit: 'rem', value: 1 }],
    display: 'none'
  },
  'scroll-to-top a': {
    width: [{ unit: 'rem', value: 3.5 }],
    height: [{ unit: 'rem', value: 3.5 }],
    backgroundColor: 'rgba(33, 37, 41, 0.5)',
    lineHeight: [{ unit: 'rem', value: 3.1 }]
  },
  '#mainNav': {
    paddingTop: [{ unit: 'rem', value: 1 }],
    paddingBottom: [{ unit: 'rem', value: 1 }],
    fontWeight: '700',
    fontFamily: ''Montserrat'',
    '>w992': {
      paddingTop: [{ unit: 'rem', value: 1.5 }],
      paddingBottom: [{ unit: 'rem', value: 1.5 }],
      WebkitTransition: 'padding-top 0.3s, padding-bottom 0.3s',
      MozTransition: 'padding-top 0.3s, padding-bottom 0.3s',
      transition: 'padding-top 0.3s, padding-bottom 0.3s'
    }
  },
  '#mainNav navbar-brand': {
    color: '#fff'
  },
  '#mainNav navbar-nav': {
    marginTop: [{ unit: 'rem', value: 1 }],
    letterSpacing: [{ unit: 'rem', value: 0.0625 }]
  },
  '#mainNav navbar-nav linav-item anav-link': {
    color: '#fff'
  },
  '#mainNav navbar-nav linav-item anav-link:hover': {
    color: '#00aaFF'
  },
  '#mainNav navbar-nav linav-item anav-link:active': {
    color: '#fff'
  },
  '#mainNav navbar-nav linav-item anav-link:focus': {
    color: '#fff'
  },
  '#mainNav navbar-nav linav-item anav-linkactive': {
    color: '#00aaFF'
  },
  '#mainNav navbar-toggler': {
    fontSize: [{ unit: '%V', value: 0.8 }],
    padding: [{ unit: 'rem', value: 0.8 }, { unit: 'rem', value: 0.8 }, { unit: 'rem', value: 0.8 }, { unit: 'rem', value: 0.8 }]
  },
  headermasthead: {
    paddingTop: [{ unit: 'rem', value: NaN }],
    paddingBottom: [{ unit: 'rem', value: 6 }],
    '>w992': {
      paddingTop: [{ unit: 'rem', value: NaN }],
      paddingBottom: [{ unit: 'rem', value: 6 }]
    }
  },
  'headermasthead h1': {
    fontSize: [{ unit: 'rem', value: 3 }],
    lineHeight: [{ unit: 'rem', value: 3 }]
  },
  'headermasthead h2': {
    fontSize: [{ unit: 'rem', value: 1.3 }],
    fontFamily: ''Lato''
  },
  portfolio: {
    marginBottom: [{ unit: 'px', value: -15 }],
    '>w576': {
      marginBottom: [{ unit: 'px', value: -30 }]
    }
  },
  'portfolio portfolio-item': {
    position: 'relative',
    display: 'block',
    maxWidth: [{ unit: 'rem', value: 25 }],
    marginBottom: [{ unit: 'px', value: 15 }]
  },
  'portfolio portfolio-item portfolio-item-caption': {
    WebkitTransition: 'all ease 0.5s',
    MozTransition: 'all ease 0.5s',
    transition: 'all ease 0.5s',
    opacity: '0',
    backgroundColor: 'rgba(0, 191, 255, 0.9)'
  },
  'portfolio portfolio-item portfolio-item-caption:hover': {
    opacity: '1'
  },
  'portfolio portfolio-item portfolio-item-caption portfolio-item-caption-content': {
    fontSize: [{ unit: 'rem', value: 1.5 }]
  },
  'portfolio-modal portfolio-modal-dialog': {
    padding: [{ unit: 'rem', value: 3 }, { unit: 'rem', value: 1 }, { unit: 'rem', value: 3 }, { unit: 'rem', value: 1 }],
    minHeight: [{ unit: 'vh', value: NaN }],
    margin: [{ unit: 'rem', value: 1 }, { unit: 'rem', value: NaN }, { unit: 'rem', value: 1 }, { unit: 'rem', value: NaN }],
    position: 'relative',
    zIndex: '2',
    MozBoxShadow: '0 0 3rem 1rem rgba(0, 0, 0, 0.5)',
    WebkitBoxShadow: '0 0 3rem 1rem rgba(0, 0, 0, 0.5)',
    boxShadow: [{ unit: 'px', value: 0 }, { unit: 'px', value: 0 }, { unit: 'rem', value: 3 }, { unit: 'rem', value: 1 }, { unit: 'string', value: 'rgba(0, 0, 0, 0.5)' }],
    '>w768': {
      minHeight: [{ unit: 'vh', value: 100 }],
      padding: [{ unit: 'rem', value: 5 }, { unit: 'rem', value: 5 }, { unit: 'rem', value: 5 }, { unit: 'rem', value: 5 }],
      margin: [{ unit: 'rem', value: 3 }, { unit: 'rem', value: NaN }, { unit: 'rem', value: 3 }, { unit: 'rem', value: NaN }]
    }
  },
  'portfolio-modal portfolio-modal-dialog close-button': {
    position: 'absolute',
    top: [{ unit: 'rem', value: 2 }],
    right: [{ unit: 'rem', value: 2 }]
  },
  'portfolio-modal portfolio-modal-dialog close-button i': {
    lineHeight: [{ unit: 'px', value: 38 }]
  },
  'portfolio-modal portfolio-modal-dialog h2': {
    fontSize: [{ unit: 'rem', value: 2 }]
  },
  'floating-label-form-group': {
    position: 'relative',
    borderBottom: [{ unit: 'px', value: 1 }, { unit: 'string', value: 'solid' }, { unit: 'string', value: '#e9ecef' }]
  },
  'floating-label-form-group input': {
    fontSize: [{ unit: 'em', value: 1.5 }],
    position: 'relative',
    zIndex: '1',
    paddingRight: [{ unit: 'px', value: 0 }],
    paddingLeft: [{ unit: 'px', value: 0 }],
    resize: 'none',
    border: [{ unit: 'string', value: 'none' }],
    borderRadius: '0',
    background: 'none',
    boxShadow: [{ unit: 'string', value: 'none' }, { unit: 'string', value: '!important' }, { unit: 'string', value: 'none' }, { unit: 'string', value: '!important' }]
  },
  'floating-label-form-group textarea': {
    fontSize: [{ unit: 'em', value: 1.5 }],
    position: 'relative',
    zIndex: '1',
    paddingRight: [{ unit: 'px', value: 0 }],
    paddingLeft: [{ unit: 'px', value: 0 }],
    resize: 'none',
    border: [{ unit: 'string', value: 'none' }],
    borderRadius: '0',
    background: 'none',
    boxShadow: [{ unit: 'string', value: 'none' }, { unit: 'string', value: '!important' }, { unit: 'string', value: 'none' }, { unit: 'string', value: '!important' }]
  },
  'floating-label-form-group label': {
    fontSize: [{ unit: 'em', value: 0.85 }],
    lineHeight: [{ unit: 'em', value: 1.764705882 }],
    position: 'relative',
    zIndex: '0',
    top: [{ unit: 'em', value: 2 }],
    display: 'block',
    margin: [{ unit: 'px', value: 0 }, { unit: 'px', value: 0 }, { unit: 'px', value: 0 }, { unit: 'px', value: 0 }],
    WebkitTransition: 'top 0.3s ease, opacity 0.3s ease',
    MozTransition: 'top 0.3s ease, opacity 0.3s ease',
    MsTransition: 'top 0.3s ease, opacity 0.3s ease',
    transition: 'top 0.3s ease, opacity 0.3s ease',
    verticalAlign: 'middle',
    verticalAlign: 'baseline',
    opacity: '0'
  },
  'floating-label-form-group:not(:first-child)': {
    paddingLeft: [{ unit: 'px', value: 14 }],
    borderLeft: [{ unit: 'px', value: 1 }, { unit: 'string', value: 'solid' }, { unit: 'string', value: '#e9ecef' }]
  },
  'floating-label-form-group-with-value label': {
    top: [{ unit: 'px', value: 0 }],
    opacity: '1'
  },
  'floating-label-form-group-with-focus label': {
    color: '#00aaFF'
  },
  'form row:first-child floating-label-form-group': {
    borderTop: [{ unit: 'px', value: 1 }, { unit: 'string', value: 'solid' }, { unit: 'string', value: '#e9ecef' }]
  },
  footer: {
    paddingTop: [{ unit: 'rem', value: 5 }],
    paddingBottom: [{ unit: 'rem', value: 5 }],
    backgroundColor: '#003961',
    color: '#fff'
  },
  copyright: {
    backgroundColor: '#1a252f'
  },
  'a': {
    color: '#00aaFF'
  },
  'a:focus': {
    color: '#128f76'
  },
  'a:hover': {
    color: '#128f76'
  },
  'a:active': {
    color: '#128f76'
  },
  btn: {
    borderWidth: '2px'
  },
  'bg-primary': {
    backgroundColor: '#00aaFF !important'
  },
  'bg-secondary': {
    backgroundColor: '#003961 !important'
  },
  'text-primary': {
    color: '#00aaFF !important'
  },
  'text-secondary': {
    color: '#003961 !important'
  },
  'btn-primary': {
    backgroundColor: '#00aaFF',
    borderColor: '#00aaFF'
  },
  'btn-primary:hover': {
    backgroundColor: '#128f76',
    borderColor: '#128f76'
  },
  'btn-primary:focus': {
    backgroundColor: '#128f76',
    borderColor: '#128f76'
  },
  'btn-primary:active': {
    backgroundColor: '#128f76',
    borderColor: '#128f76'
  },
  'btn-secondary': {
    backgroundColor: '#003961',
    borderColor: '#003961'
  },
  'btn-secondary:hover': {
    backgroundColor: '#1a252f',
    borderColor: '#1a252f'
  },
  'btn-secondary:focus': {
    backgroundColor: '#1a252f',
    borderColor: '#1a252f'
  },
  'btn-secondary:active': {
    backgroundColor: '#1a252f',
    borderColor: '#1a252f'
  }
});
