const path = require('path');

module.exports = {
  entry: './src/assets/js/dev/index.js', 
  output: {
    path: path.resolve(__dirname, './src/assets/js/'), 
    filename: 'main.js', 
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env'],
          },
        },
      },
    ],
  },
};